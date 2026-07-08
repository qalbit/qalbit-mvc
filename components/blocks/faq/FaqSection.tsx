"use client";

import Link from "next/link";
import { useEffect, useRef } from "react";
import type { FaqBlockProps } from "@/lib/blocks/types";

const DEFAULT_BULLETS = [
  "✓ Covers custom software development, SaaS platforms, mobile apps and integrations.",
  "✓ Answers about pricing, engagement models, NDAs, IP ownership and quality assurance.",
  "✓ Written for founders, CTOs and product teams hiring a remote development partner.",
];

const DEFAULT_CTA_CARD = {
  title: "Have a question that is not listed here?",
  body: "Share your roadmap or idea and we'll help you pick the right engagement model, tech stack and starting point.",
  primary: {
    label: "Contact our experts",
    href: "/contact-us/",
    ariaLabel: "Talk to QalbIT about your custom software requirements",
  },
};

function getPanelHeight(panel: HTMLElement) {
  const inner = panel.querySelector<HTMLElement>(".faq-panel-inner");
  const styles = getComputedStyle(panel);
  const paddingTop = parseFloat(styles.paddingTop) || 0;
  const paddingBottom = parseFloat(styles.paddingBottom) || 0;
  const contentHeight = inner?.scrollHeight ?? panel.scrollHeight;
  return contentHeight + paddingTop + paddingBottom;
}

function initFaqAccordion(section: HTMLElement) {
  const items = Array.from(section.querySelectorAll<HTMLElement>("[data-faq-item]"));
  if (!items.length) return;

  const prefersReducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  type LegacyGsap = {
    fromTo: (
      target: HTMLElement,
      from: Record<string, number>,
      to: Record<string, unknown>,
    ) => { kill: () => void };
    timeline: (options: { paused: boolean }) => {
      from: (
        target: Element | Element[],
        vars: Record<string, unknown>,
        position?: string | number,
      ) => void;
      play: () => void;
    };
  };

  const gsap =
    typeof window !== "undefined" && "gsap" in window
      ? (window as Window & { gsap: LegacyGsap }).gsap
      : null;
  const hasGsap = !!gsap;
  const panelTweens = new WeakMap<HTMLElement, { kill: () => void }>();

  function setItemOpen(item: HTMLElement, shouldOpen: boolean) {
    const panel = item.querySelector<HTMLElement>("[data-faq-panel]");
    const trigger = item.querySelector<HTMLElement>("[data-faq-trigger]");
    if (!panel || !trigger) return;

    const existingTween = panelTweens.get(panel);
    if (existingTween) existingTween.kill();

    item.classList.toggle("is-open", shouldOpen);
    trigger.setAttribute("aria-expanded", shouldOpen ? "true" : "false");
    panel.hidden = false;

    const targetH = shouldOpen ? getPanelHeight(panel) : 0;
    const startH = panel.offsetHeight;

    if (!hasGsap || prefersReducedMotion) {
      panel.style.height = `${shouldOpen ? targetH : 0}px`;
      if (!shouldOpen) {
        window.setTimeout(() => {
          panel.hidden = true;
          panel.style.height = "0";
        }, 260);
      } else {
        panel.style.height = "auto";
      }
      return;
    }

    const tween = gsap.fromTo(
      panel,
      { height: startH },
      {
        height: targetH,
        duration: 0.28,
        ease: "power2.out",
        onComplete: () => {
          panel.style.height = shouldOpen ? "auto" : "";
          if (!shouldOpen) {
            panel.hidden = true;
            panel.style.height = "0";
          }
        },
      },
    );

    panelTweens.set(panel, tween);
  }

  items.forEach((item, index) => {
    const panel = item.querySelector<HTMLElement>("[data-faq-panel]");
    const trigger = item.querySelector<HTMLElement>("[data-faq-trigger]");
    if (!panel || !trigger) return;

    panel.style.overflow = "hidden";
    panel.style.maxHeight = "none";

    const isFirst = index === 0;
    item.classList.toggle("is-open", isFirst);
    trigger.setAttribute("aria-expanded", isFirst ? "true" : "false");

    if (isFirst) {
      panel.hidden = false;
      panel.style.height = "auto";
    } else {
      panel.hidden = true;
      panel.style.height = "0";
    }

    trigger.addEventListener("click", () => {
      const isOpen = item.classList.contains("is-open");
      items.forEach((other) => {
        if (other !== item && other.classList.contains("is-open")) {
          setItemOpen(other, false);
        }
      });
      setItemOpen(item, !isOpen);
    });
  });

  if (hasGsap && gsap && !prefersReducedMotion) {
    const header = section.querySelector("[data-faq-header]");
    const tl = gsap.timeline({ paused: true });

    if (header) {
      tl.from(header, { y: 24, autoAlpha: 0, duration: 0.35, ease: "power2.out" });
    }

    tl.from(
      items,
      { y: 24, autoAlpha: 0, duration: 0.35, ease: "power2.out", stagger: 0.05 },
      header ? "-=0.1" : 0,
    );

    if ("IntersectionObserver" in window) {
      const observer = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (entry.target === section && entry.isIntersecting) {
              tl.play();
              observer.disconnect();
            }
          });
        },
        { threshold: 0.2 },
      );
      observer.observe(section);
    } else {
      tl.play();
    }
  }
}

export function FaqSection({
  id = "home-faqs",
  title,
  subtitle,
  bullets = DEFAULT_BULLETS,
  faqs,
  ctaCard = DEFAULT_CTA_CARD,
  mvpHooks = false,
}: FaqBlockProps) {
  const sectionRef = useRef<HTMLElement>(null);
  const headingId = `${id}-heading`;

  useEffect(() => {
    const section = sectionRef.current;
    if (!section || section.dataset.faqInitialized === "true") return;

    let cancelled = false;
    let attempts = 0;

    const run = () => {
      if (cancelled || section.dataset.faqInitialized === "true") return;

      if (!("gsap" in window) && attempts < 24) {
        attempts += 1;
        window.setTimeout(run, 50);
        return;
      }

      section.dataset.faqInitialized = "true";
      initFaqAccordion(section);
    };

    run();

    return () => {
      cancelled = true;
    };
  }, [faqs]);

  if (!faqs.length) return null;

  return (
    <section
      ref={sectionRef}
      id={id}
      className="bg-slate-50 py-16 text-foreground"
      aria-labelledby={headingId}
      data-faq-section
      data-faq-managed="react"
      {...(mvpHooks ? { "data-mvp-section": "s9" } : {})}
    >
      <div className="mx-auto max-w-6xl px-4">
        <div className="grid gap-10 lg:grid-cols-[minmax(0,1.05fr)_minmax(0,1.6fr)] lg:items-start">
          <header className="max-w-xl space-y-4" data-faq-header>
            <span
              className="inline-flex items-center rounded-full border border-slate-200 bg-white/90 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.14em] text-muted-foreground shadow-soft"
            >
              FAQs · Custom software & teams
            </span>

            <h2 id={headingId} className="text-display-sm font-bold tracking-tight sm:text-display-md">
              {title}
            </h2>

            {subtitle && <p className="text-sm md:text-base text-muted-foreground">{subtitle}</p>}

            {bullets.length > 0 && (
              <ul className="mt-4 space-y-2 text-xs md:text-sm text-muted-foreground/95">
                {bullets.map((bullet) => (
                  <li key={bullet}>{bullet}</li>
                ))}
              </ul>
            )}

            {ctaCard && (
              <div className="faq-cta-card mt-6 rounded-2xl border border-slate-200 bg-white/90 p-4 text-xs shadow-soft md:text-sm">
                {ctaCard.title && (
                  <p className="mb-1 font-semibold text-foreground">{ctaCard.title}</p>
                )}
                {ctaCard.body && <p className="mb-3 text-muted-foreground">{ctaCard.body}</p>}
                {ctaCard.primary && (
                  <Link
                    href={ctaCard.primary.href}
                    className="inline-flex items-center gap-2 text-xs font-semibold text-primary-700 hover:text-primary-900"
                    title={ctaCard.primary.ariaLabel}
                    aria-label={ctaCard.primary.ariaLabel}
                  >
                    {ctaCard.primary.label}
                    <span aria-hidden="true">→</span>
                  </Link>
                )}
              </div>
            )}
          </header>

          <div className="space-y-3" data-faq-list>
            {faqs.map((faq, index) => {
              if (!faq.question || (!faq.answer && !faq.answer_html)) return null;

              const faqId = `faq-${index + 1}`;
              const buttonId = `faq-trigger-${faqId}`;
              const panelId = `faq-panel-${faqId}`;
              const isFirst = index === 0;

              return (
                <article
                  key={faq.question}
                  className={`faq-item${isFirst ? " is-open" : ""}`}
                  data-faq-item
                  data-faq-id={faqId}
                  {...(mvpHooks ? { "data-mvp-faq-item": "" } : {})}
                >
                  <h3 className="sr-only">{faq.question}</h3>

                  <button
                    type="button"
                    className="faq-trigger"
                    id={buttonId}
                    aria-expanded={isFirst}
                    aria-controls={panelId}
                    data-faq-trigger
                    data-faq-target={faqId}
                  >
                    <span className="faq-trigger-label">{faq.question}</span>
                    <span className="faq-trigger-icon" aria-hidden="true" />
                  </button>

                  <div
                    id={panelId}
                    className={`faq-panel${isFirst ? " is-open" : ""}`}
                    data-faq-panel
                    data-faq-id={faqId}
                    role="region"
                    aria-labelledby={buttonId}
                    hidden={!isFirst}
                  >
                    <div className="faq-panel-inner">
                      {faq.answer_html ? (
                        <div dangerouslySetInnerHTML={{ __html: faq.answer_html }} />
                      ) : (
                        <p>{faq.answer}</p>
                      )}
                    </div>
                  </div>
                </article>
              );
            })}
          </div>
        </div>
      </div>
    </section>
  );
}
