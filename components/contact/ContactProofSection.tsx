"use client";

import Link from "next/link";
import { useEffect, useRef } from "react";
import { Container } from "@/components/ui";
import { getContactPageClients } from "@/lib/data";
import { asset } from "@/lib/site";

const proofCards = [
  {
    tag: "Sports & Club Management",
    title: "Snappy Stats – events, members & club management for shooting ranges",
    description:
      "QalbIT built a club management web app that centralises bookings, events, lanes and instructors for a European shooting academy.",
    result:
      "Result: smoother operations, clearer occupancy visibility and a better experience for staff and members.",
    href: "/case-studies/snappystats/",
    linkLabel: "View Snappy Stats case study",
  },
  {
    tag: "HR Tech & Recruitment",
    title: "Bloomford – hiring portal & lightweight ATS for executive search",
    description:
      "Recruitment portal that centralises vacancies, candidates, video interviews and test assessments so consultants manage everything in one place.",
    result:
      "Result: less time in email and spreadsheets, faster shortlisting and clearer candidate progress.",
    href: "/case-studies/bloomford/",
    linkLabel: "View Bloomford case study",
  },
  {
    tag: "Productivity & Communication",
    title: "Hellory Reminder – multi-channel productivity & communication app",
    description:
      "Cross-platform reminder and communication product with Flutter apps and a Node.js/MongoDB backend to keep users on top of their busy lives.",
    result:
      "Result: reliable notifications, stronger engagement and a foundation for future iterations.",
    href: "/case-studies/hellory/",
    linkLabel: "View Hellory case study",
  },
];

function initContactProofReveal(section: HTMLElement) {
  const prefersReducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  if (prefersReducedMotion) return;

  type LegacyGsap = {
    timeline: (options?: { defaults?: Record<string, unknown> }) => {
      from: (
        target: Element | Element[],
        vars: Record<string, unknown>,
        position?: string | number,
      ) => void;
    };
  };

  const gsap =
    typeof window !== "undefined" && "gsap" in window
      ? (window as Window & { gsap: LegacyGsap }).gsap
      : null;
  if (!gsap) return;

  const logos = Array.from(section.querySelectorAll<HTMLElement>("[data-contact-logo]"));
  const cards = Array.from(section.querySelectorAll<HTMLElement>("[data-proof-card]"));
  if (!logos.length && !cards.length) return;

  const animateIn = () => {
    const tl = gsap.timeline({ defaults: { ease: "power3.out" } });

    if (logos.length) {
      tl.from(logos, {
        y: 20,
        opacity: 0,
        scale: 0.96,
        duration: 0.7,
        stagger: { each: 0.05, from: "center" },
      });
    }

    if (cards.length) {
      tl.from(
        cards,
        {
          y: 32,
          opacity: 0,
          rotateX: 4,
          transformOrigin: "center bottom",
          duration: 0.9,
          stagger: 0.08,
        },
        logos.length ? "-=0.25" : 0,
      );
    }
  };

  if ("IntersectionObserver" in window) {
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.target === section && entry.isIntersecting) {
            animateIn();
            observer.disconnect();
          }
        });
      },
      { threshold: 0.2 },
    );
    observer.observe(section);
  } else {
    animateIn();
  }
}

export function ContactProofSection() {
  const sectionRef = useRef<HTMLElement>(null);
  const contactClients = getContactPageClients();

  useEffect(() => {
    const section = sectionRef.current;
    if (!section || section.dataset.proofInitialized === "true") return;

    let cancelled = false;
    let attempts = 0;

    const run = () => {
      if (cancelled || section.dataset.proofInitialized === "true") return;

      if (!("gsap" in window) && attempts < 24) {
        attempts += 1;
        window.setTimeout(run, 50);
        return;
      }

      section.dataset.proofInitialized = "true";
      initContactProofReveal(section);
    };

    run();

    return () => {
      cancelled = true;
    };
  }, []);

  return (
    <section
      ref={sectionRef}
      id="contact-proof"
      data-contact-section="c3"
      data-contact-proof-managed="react"
      className="border-t border-slate-900 bg-white py-14 sm:py-16 lg:py-20"
    >
      <Container className="space-y-10">
        <header className="max-w-3xl space-y-3">
          <h2 className="text-display-md font-bold text-slate-900 sm:text-display-lg md:text-display-xl">
            Teams trust QalbIT to ship reliable SaaS and custom software
          </h2>
          <p className="text-sm text-slate-600 sm:text-base">
            From early-stage startups to growing product teams, we help design, build and scale{" "}
            <span className="font-medium text-slate-900">production-grade web, mobile and SaaS platforms</span>.
            Here are a few examples of the kind of outcomes we focus on.
          </p>
        </header>

        <div className="grid grid-cols-1 gap-10">
          <div className="space-y-4">
            <h3 className="text-xs font-semibold uppercase tracking-wide text-slate-900">
              Product and business teams we have worked with
            </h3>

            <div
              className="grid grid-cols-2 gap-3 sm:grid-cols-3 md:grid-cols-6"
              data-contact-logo-grid
              aria-label="Selected client and product logos"
            >
              {contactClients.map((client) => (
                <div
                  key={client.id}
                  className="flex items-center justify-center rounded-lg border border-slate-200 bg-white/80 px-2 py-2 shadow-sm shadow-slate-950/5"
                  data-contact-logo
                >
                  {client.url ? (
                    <a
                      href={client.url}
                      target="_blank"
                      rel="noopener noreferrer"
                      className="inline-flex items-center justify-center"
                    >
                      <img
                        src={asset(client.logo)}
                        alt={client.alt ?? client.name}
                        loading="lazy"
                        className="max-h-8 w-auto object-contain"
                      />
                      <span className="sr-only">{client.name}</span>
                    </a>
                  ) : (
                    <>
                      <img
                        src={asset(client.logo)}
                        alt={client.alt ?? client.name}
                        loading="lazy"
                        className="max-h-8 w-auto object-contain"
                      />
                      <span className="sr-only">{client.name}</span>
                    </>
                  )}
                </div>
              ))}
            </div>

            <p className="text-[11px] text-slate-600">
              Looking for something similar? Share a short brief on the contact form and we can share relevant case
              studies, architecture and implementation details under NDA.
            </p>
          </div>

          <div className="space-y-4">
            <h3 className="text-xs font-semibold uppercase tracking-wide text-slate-900">
              Snapshot outcomes from recent projects
            </h3>

            <div className="grid grid-cols-1 gap-4 sm:grid-cols-3">
              {proofCards.map((card) => (
                <article
                  key={card.href}
                  className="group relative overflow-hidden rounded-2xl border border-slate-200 bg-white p-4 shadow-sm shadow-slate-100 transition-transform transition-shadow hover:-translate-y-1 hover:border-primary-500/80 hover:shadow-md hover:shadow-primary-100 focus-within:ring-2 focus-within:ring-primary-500/70 focus-within:ring-offset-2 focus-within:ring-offset-slate-50"
                  data-proof-card
                >
                  <div
                    className="pointer-events-none absolute inset-x-0 -top-px h-px bg-gradient-to-r from-transparent via-primary-300/80 to-transparent"
                    aria-hidden="true"
                  />
                  <p className="inline-flex items-center rounded-full bg-primary-50 px-2.5 py-0.5 text-[11px] font-medium text-primary-700">
                    {card.tag}
                  </p>
                  <h4 className="mt-2 text-sm font-semibold text-slate-950">{card.title}</h4>
                  <p className="mt-2 text-xs text-slate-600 sm:text-sm">{card.description}</p>
                  <p className="mt-1 text-[11px] text-slate-500">{card.result}</p>
                  <Link
                    href={card.href}
                    className="mt-3 inline-flex items-center text-[11px] font-medium text-primary-700 underline underline-offset-4 hover:text-primary-900"
                  >
                    {card.linkLabel}
                    <svg className="ml-1 h-3 w-3" viewBox="0 0 16 16" aria-hidden="true">
                      <path
                        d="M5.25 3.5h7.25m0 0v7.25m0-7.25L5 11.25"
                        fill="none"
                        stroke="currentColor"
                        strokeLinecap="round"
                        strokeLinejoin="round"
                        strokeWidth="1.4"
                      />
                    </svg>
                  </Link>
                </article>
              ))}
            </div>
          </div>
        </div>
      </Container>
    </section>
  );
}
