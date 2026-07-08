import {
  caseStudies,
  industries,
  processPages,
  services,
  technologies,
} from "./index";

export interface SitemapLink {
  label: string;
  href: string;
}

export interface SitemapGroup {
  title: string;
  description?: string;
  columns: SitemapLink[][];
}

function entityLinks(items: { name: string; slug: string }[]): SitemapLink[] {
  return items.map((item) => ({ label: item.name, href: item.slug }));
}

function splitIntoColumns(links: SitemapLink[], columnCount: number): SitemapLink[][] {
  const cols: SitemapLink[][] = Array.from({ length: columnCount }, () => []);
  links.forEach((link, index) => {
    cols[index % columnCount].push(link);
  });
  return cols;
}

/** HTML sitemap groups — static sections mirror PHP `pages/sitemap/index.php`; lists use live config data. */
export function getSitemapGroups(): SitemapGroup[] {
  const processLinks = entityLinks(processPages);

  return [
    {
      title: "Discover QalbIT",
      description:
        "High-level pages people usually visit first when evaluating us as a software partner.",
      columns: [
        [
          { label: "Home", href: "/" },
          { label: "About QalbIT", href: "/about-us/" },
          { label: "Technologies", href: "/technologies/" },
          { label: "Industries", href: "/industries/" },
          { label: "Portfolio", href: "/portfolio/" },
        ],
        [
          { label: "Our Services", href: "/services/" },
          { label: "Careers", href: "/career/" },
          { label: "Contact Us", href: "/contact-us/" },
          { label: "Our Insights / Blog", href: "/blog/" },
          { label: "Sitemap", href: "/sitemap/" },
        ],
      ],
    },
    {
      title: "Our Process",
      description: "How we approach discovery, MVP, scaling and long-term product partnerships.",
      columns: splitIntoColumns(processLinks.length ? processLinks : [
        { label: "Start-Up MVP", href: "/start-up-mvp/" },
        { label: "Product Scaling", href: "/product-scaling/" },
        { label: "Digital Transformation", href: "/digital-transformation/" },
        { label: "Engagement Models", href: "/engagement-model/" },
      ], 2),
    },
    {
      title: "Our Services",
      description:
        "Custom software development services we provide for founders, product teams and enterprises.",
      columns: splitIntoColumns(entityLinks(services), 2),
    },
    {
      title: "Industries We Serve",
      description: "Industries and domains where we have shipped production-ready software.",
      columns: splitIntoColumns(entityLinks(industries), 2),
    },
    {
      title: "Technologies & Stacks",
      description: "Core technologies and platforms we use across backend, frontend and mobile.",
      columns: splitIntoColumns(entityLinks(technologies), 2),
    },
    {
      title: "Portfolio & Case Studies",
      description: "Selected projects, internal products and platforms we have shipped with clients.",
      columns: splitIntoColumns(
        [
          { label: "Portfolio Overview", href: "/portfolio/" },
          ...entityLinks(caseStudies),
        ],
        2,
      ),
    },
    {
      title: "Careers & Hiring",
      description:
        "Information for engineers, designers and product people exploring roles at QalbIT.",
      columns: [
        [
          { label: "Careers Overview", href: "/career/" },
          { label: "Open Positions", href: "/career/#cr3-open-positions" },
          { label: "Life at QalbIT", href: "/career/#cr7-life" },
        ],
        [
          { label: "General Application", href: "/career/apply/" },
          { label: "Apply for Laravel Roles", href: "/career/apply/?role=laravel-developer" },
        ],
      ],
    },
    {
      title: "Resources & Insights",
      description: "Content, updates and learning resources related to custom software development.",
      columns: [
        [{ label: "Blog", href: "/blog/" }],
        [{ label: "Contact for Speaking / Workshops", href: "/contact-us/?topic=speaking" }],
      ],
    },
    {
      title: "Legal & Policies",
      description: "Documents that describe how we handle data, security and website usage.",
      columns: [
        [
          { label: "Privacy Policy", href: "/privacy-policy/" },
          { label: "Terms & Conditions", href: "/terms-and-condition/" },
          { label: "Cookie Policy", href: "/cookie-policy/" },
        ],
      ],
    },
  ];
}
