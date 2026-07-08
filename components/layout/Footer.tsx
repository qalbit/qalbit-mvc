import Link from "next/link";
import { asset } from "@/lib/site";

type FooterLink = {
  label: string;
  href: string;
  title?: string;
  external?: boolean;
  className?: string;
};

const DISCOVER_LINKS: FooterLink[] = [
  { label: "About Us", href: "/about-us/", title: "Learn more about QalbIT" },
  { label: "Technologies", href: "/technologies/", title: "Explore the technologies we use" },
  { label: "Our Services", href: "/services/", title: "View our services" },
  { label: "Our Industries", href: "/industries/", title: "Explore the industry we serve" },
  { label: "Our Work", href: "/portfolio/", title: "Check out our work" },
  { label: "Contact Us", href: "/contact-us/", title: "Contact us for more information" },
  { label: "Job Opportunities", href: "/career/", title: "Explore career opportunities with us" },
  { label: "Our Insights", href: "/blog/", title: "Read our latest blog posts" },
  { label: "Sitemap", href: "/sitemap/", title: "View our full sitemap with all pages" },
];

const PROCESS_LINKS: FooterLink[] = [
  {
    label: "Minimal Viable Product",
    href: "/start-up-mvp/",
    title: "Learn about our approach to creating Minimal Viable Products",
  },
  {
    label: "Product Scaling Team",
    href: "/product-scaling/",
    title: "Discover how we scale products for growth",
  },
  {
    label: "Digital Transformation",
    href: "/digital-transformation/",
    title: "See how we help companies digitally transform",
  },
  {
    label: "Engagement Model",
    href: "/engagement-model/",
    title: "Understand our client engagement model",
  },
];

const SERVICE_LINKS: FooterLink[] = [
  { label: "AI Solutions", href: "/services/ai-solutions/", title: "AI Development Services" },
  {
    label: "Web Development",
    href: "/services/custom-web-development/",
    title: "Custom Web Development Services",
  },
  {
    label: "Mobile App Development",
    href: "/services/mobile-development/",
    title: "Mobile App Development Services",
  },
  {
    label: "E-commerce Solutions",
    href: "/services/e-commerce/",
    title: "E-commerce Solutions for Your Business",
  },
  {
    label: "Cloud-Based Solutions",
    href: "/services/cloud-based-solutions/",
    title: "Cloud-Based Solutions to Enhance Your Operations",
  },
  {
    label: "Software Development",
    href: "/services/custom-software-development/",
    title: "Bespoke Software Development Tailored to Your Needs",
  },
  {
    label: "UI/UX Design Services",
    href: "/services/ui-ux-design-service/",
    title: "UI/UX Design Services to Elevate User Experience",
  },
  {
    label: "API Development",
    href: "/services/api-development/",
    title: "API Development Services for Seamless Integration",
  },
  { label: "SaaS Solutions", href: "/services/saas/", title: "SaaS Solutions to Empower Your Business" },
  {
    label: "Web Applications",
    href: "/services/web-applications/",
    title: "Develop Advanced Web Applications with Us",
  },
  {
    label: "Mobile App Backend",
    href: "/services/mobile-app-backend/",
    title: "Back-end Development for Mobile Applications",
  },
];

const INDUSTRY_LINKS: FooterLink[] = [
  {
    label: "E-Commerce",
    href: "/industries/e-commerce/",
    title: "Discover our solutions for the E-commerce industry",
  },
  {
    label: "Entertainment",
    href: "/industries/entertainment/",
    title: "Explore our services for the Entertainment industry",
  },
  {
    label: "Fintech",
    href: "/industries/fintech/",
    title: "Find out how we innovate in the Fintech sector",
  },
  { label: "Travel", href: "/industries/travel/", title: "See our Travel industry solutions" },
  {
    label: "Food Delivery",
    href: "/industries/food-delivery/",
    title: "Learn about our Food Delivery services",
  },
  { label: "Sports", href: "/industries/sports/", title: "Check out our services for the Sports industry" },
  {
    label: "Healthcare",
    href: "/industries/healthcare/",
    title: "Explore Healthcare solutions we offer",
  },
  {
    label: "Education",
    href: "/industries/education/",
    title: "Discover our Educational services and solutions",
  },
  {
    label: "Real Estate",
    href: "/industries/real-estate/",
    title: "Real Estate solutions to grow your business",
  },
  {
    label: "Social Networking",
    href: "/industries/social-networking/",
    title: "Social Networking services to connect and engage",
  },
  { label: "Business", href: "/industries/business/", title: "Business services for modern companies" },
];

const HIRE_LINKS: FooterLink[] = [
  {
    label: "Hire Laravel Developers",
    href: "/hire-laravel-developers/",
    title: "Hire skilled Laravel developers for your projects",
  },
  {
    label: "Hire Node.js Developers",
    href: "/hire-nodejs-developers/",
    title: "Engage our expert Node.js developers for your development needs",
  },
  {
    label: "Hire Next.js Developers",
    href: "/hire-nextjs-developers/",
    title: "Engage our expert Next.js developers for your development needs",
  },
  {
    label: "Hire Flutter Developers",
    href: "/hire-flutter-developers/",
    title: "Engage our expert Flutter developers for your development needs",
  },
];

const SOCIAL_LINKS = [
  {
    href: "https://www.linkedin.com/company/qalbit/",
    label: "LinkedIn",
    icon: "images/icons/linkedin-light.svg",
    ariaLabel: "Follow us on LinkedIn",
  },
  {
    href: "https://x.com/qalb_it",
    label: "Twitter",
    icon: "images/icons/twitter-light.svg",
    ariaLabel: "Follow us on Twitter",
  },
  {
    href: "https://www.facebook.com/qalbitinfotech/",
    label: "Facebook",
    icon: "images/icons/facebook-light.svg",
    ariaLabel: "Follow us on Facebook",
  },
  {
    href: "https://www.instagram.com/qalbitinfotech/",
    label: "Instagram",
    icon: "images/icons/instagram-light.svg",
    ariaLabel: "Follow us on Instagram",
  },
  {
    href: "https://github.com/qalbit/",
    label: "Github",
    icon: "images/icons/github-light.svg",
    ariaLabel: "Follow us on Github",
  },
];

export function Footer() {
  const year = new Date().getFullYear();

  return (
    <footer id="site-footer" className="bg-slate-950 text-slate-50" data-footer-section>
      <div className="mx-auto max-w-6xl space-y-10 px-4 pb-6 pt-10">
        <div
          className="flex flex-col gap-6 border-b border-slate-800 pb-6 md:flex-row md:items-center md:justify-between"
          data-footer-top
        >
          <div className="flex items-center gap-3">
            <Link href="/" className="inline-flex items-center">
              <img
                loading="lazy"
                src={asset("images/brand/logo-light.svg")}
                alt="QalbIT Infotech Pvt Ltd"
                className="h-8 w-auto"
              />
            </Link>
          </div>

          <div className="flex flex-col items-start gap-2 md:items-end">
            <span className="text-xs font-medium uppercase tracking-[0.18em] text-slate-400">
              Follow Us
            </span>
            <ul className="flex flex-wrap items-center gap-3">
              {SOCIAL_LINKS.map((social) => (
                <li key={social.href}>
                  <a
                    href={social.href}
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label={social.ariaLabel}
                    className="inline-flex items-center justify-center rounded-full bg-slate-900/60 p-2 transition hover:bg-slate-800"
                  >
                    <img
                      src={asset(social.icon)}
                      alt={`Follow QalbIT on ${social.label}`}
                      className="h-4 w-4"
                      loading="lazy"
                    />
                  </a>
                </li>
              ))}
            </ul>
          </div>
        </div>

        <div className="space-y-3 pb-6" data-footer-recognized>
          <div className="text-xs font-semibold uppercase tracking-[0.18em] text-slate-400">
            Recognized By
          </div>
          <div className="flex flex-wrap gap-4">
            <RecognizedBadge
              logoSrc={asset("images/reviews/clutch-light.svg")}
              logoAlt="Recognized by Clutch"
              rating="5.0"
              ratingAlt="Five Star Rating on Clutch"
            />
            <RecognizedBadge
              logoSrc={asset("images/reviews/google-light.svg")}
              logoAlt="Recognized by Google"
              rating="4.9"
              ratingAlt="Five Star Rating on Google"
            />
            <RecognizedBadge
              logoSrc={asset("images/reviews/upwork-light.svg")}
              logoAlt="Recognized by upwork"
              rating="Top Rated Plus"
              ratingAlt="Top Rated Plus Developer on Upwork"
            />
          </div>
        </div>

        <div className="grid gap-6 pb-6 md:grid-cols-3" data-footer-connect>
          <ConnectColumn
            className="connect-project-inquiry"
            heading="Project Inquiry"
            links={[
              { label: "info@qalbit.com", href: "mailto:info@qalbit.com", external: true },
              { label: "sales@qalbit.com", href: "mailto:sales@qalbit.com", external: true },
              { label: "+91 85119 00440", href: "tel:+918511900440", external: true },
            ]}
          />
          <ConnectColumn
            className="connect-join-team"
            heading="Join our team"
            links={[
              { label: "hr@qalbit.com", href: "mailto:hr@qalbit.com", external: true },
              { label: "+91 85119 00440", href: "tel:+918511900440", external: true },
            ]}
          />
          <ConnectColumn
            className="connect-meet-us"
            heading="Meet Us In"
            links={[
              {
                label:
                  "C-109, Siddhi Vinayak Towers, Near Kataria Arcade, Opp. S.G. Highway, Makarba, Ahmedabad, India - 380051.",
                href: "https://www.google.com/maps/place/QalbIT+Infotech+Pvt+Ltd/@22.9939346,72.4962177,999m/data=!3m2!1e3!4b1!4m6!3m5!1s0x395e9b4dcb551825:0xd2ca8b0aa98f5d41!8m2!3d22.9939346!4d72.4987926!16s%2Fg%2F11h4030jl3?entry=tts&g_ep=EgoyMDI1MDMwMi4wIPu8ASoASAFQAw%3D%3D",
                external: true,
                className: "location",
              },
            ]}
          />
        </div>

        <nav
          className="grid gap-6 pb-6 md:grid-cols-5"
          aria-label="Footer navigation"
          data-footer-nav
        >
          <FooterNavColumn
            className="link-qalbit"
            heading="Discover QalbIT"
            links={DISCOVER_LINKS}
          />
          <FooterNavColumn className="link-process" heading="Our Process" links={PROCESS_LINKS} />
          <FooterNavColumn className="link-services" heading="Services" links={SERVICE_LINKS} />
          <FooterNavColumn className="link-industry" heading="Industry" links={INDUSTRY_LINKS} />
          <FooterNavColumn className="link-hire" heading="Hire Developers" links={HIRE_LINKS} />
        </nav>

        <div className="flex flex-col gap-3 pt-2 text-xs text-slate-400 md:flex-row md:items-center md:justify-between">
          <p className="copyright-text">
            © Copyright {year}. All rights reserved by QalbIT Infotech Pvt Ltd.
          </p>
          <ul className="flex flex-wrap items-center gap-4">
            <li>
              <Link href="/privacy-policy/" className="hover:text-sky-400">Privacy Policy</Link>
            </li>
            <li>
              <Link href="/terms-and-condition/" className="hover:text-sky-400">Terms of Service</Link>
            </li>
            <li>
              <a
                target="_blank"
                rel="noopener noreferrer"
                href="//www.dmca.com/Protection/Status.aspx?ID=1369625d-1306-472c-afec-8d78bdacae4c"
                title="DMCA.com Protection Status"
                className="dmca-badge"
              >
                <img
                  src="https://images.dmca.com/Badges/dmca-badge-w200-5x1-10.png?ID=1369625d-1306-472c-afec-8d78bdacae4c"
                  alt="DMCA.com Protection Status"
                />
              </a>
            </li>
          </ul>
        </div>
      </div>
    </footer>
  );
}

function RecognizedBadge({
  logoSrc,
  logoAlt,
  rating,
  ratingAlt,
}: {
  logoSrc: string;
  logoAlt: string;
  rating: string;
  ratingAlt: string;
}) {
  return (
    <div className="flex items-center gap-3 rounded-xl border border-slate-800 bg-slate-900/60 px-4 py-3">
      <img loading="lazy" src={logoSrc} alt={logoAlt} className="recognized-img h-7 w-auto" />
      <div className="rating-container flex items-center gap-2 text-xs text-slate-200">
        <span className="font-semibold">{rating}</span>
        <img
          loading="lazy"
          src={asset("images/icons/star-rating.svg")}
          alt={ratingAlt}
          className="rating-img h-3 w-auto"
        />
      </div>
    </div>
  );
}

function ConnectColumn({
  heading,
  links,
  className,
}: {
  heading: string;
  links: FooterLink[];
  className?: string;
}) {
  return (
    <div className={`connect-container space-y-2 ${className ?? ""}`}>
      <div className="container-heading text-xs font-semibold uppercase tracking-[0.18em] text-slate-400">
        {heading}
      </div>
      <ul className="space-y-1 text-sm text-slate-200">
        {links.map((link) => (
          <li key={link.href} className={link.className}>
            <FooterLinkItem link={link} />
          </li>
        ))}
      </ul>
    </div>
  );
}

function FooterNavColumn({
  heading,
  links,
  className,
}: {
  heading: string;
  links: FooterLink[];
  className?: string;
}) {
  return (
    <div className={`links-container space-y-2 ${className ?? ""}`}>
      <div className="container-heading text-xs font-semibold uppercase tracking-[0.18em] text-slate-400">
        {heading}
      </div>
      <ul className="space-y-1 text-sm text-slate-300">
        {links.map((link) => (
          <li key={link.href}>
            <FooterLinkItem link={link} />
          </li>
        ))}
      </ul>
    </div>
  );
}

function FooterLinkItem({ link }: { link: FooterLink }) {
  const className = "hover:text-sky-400";

  if (link.external) {
    return (
      <a href={link.href} target="_blank" rel="noopener noreferrer" className={className} title={link.title}>
        {link.label}
      </a>
    );
  }

  return (
    <Link href={link.href} className={className} title={link.title}>
      {link.label}
    </Link>
  );
}
