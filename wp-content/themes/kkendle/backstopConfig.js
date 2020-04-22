module.exports = {
  "id": "backstop_default",
  "viewports": [
    {
      "label": "wrist",
      "width": 150,
      "height": 150
    },
    {
      "label": "palm",
      "width": 360,
      "height": 480
    },
    {
      "label": "hands",
      "width": 600,
      "height": 480
    },
    {
      "label": "ipad",
      "width": 750,
      "height": 480
    },
    {
      "label": "hands-wide",
      "width": 850,
      "height": 768
    },
    {
      "label": "1k",
      "width": 1000,
      "height": 480
    },
    {
      "label": "lap",
      "width": 1200,
      "height": 768
    },
    {
      "label": "desk",
      "width": 1600,
      "height": 900
    },
    {
      "label": "wall",
      "width": 1920,
      "height": 900
    }
  ],
  "onBeforeScript": "puppet/onBefore.js",
  "onReadyScript": "puppet/onReady.js",
  "misMatchThreshold" : 0.1,
  "scenarios":
    generateScenarios()
  ,
  "paths": {
    "bitmaps_reference": "backstop_data/bitmaps_reference",
    "bitmaps_test": "backstop_data/bitmaps_test",
    "engine_scripts": "backstop_data/engine_scripts",
    "html_report": "backstop_data/html_report",
    "ci_report": "backstop_data/ci_report"
  },
  "report": ["browser"],
  "engine": "puppeteer",
  "engineOptions": {
    "args": ["--no-sandbox"]
  },
  "asyncCaptureLimit": 5,
  "asyncCompareLimit": 50,
  "debug": false,
  "debugWindow": false
};

function generateScenarios() {
  const myURL = "http://localhost:8888/pathways-to-independence";
  const myScenarios = [
    {"label": "Home", "url": myURL + "/"},
    {"label": "Styleguide", "url": myURL + "/styleguide/"},

    // GENERIC WP PAGES
    {"label": "404", "url": myURL + "/404/"},
    {"label": "Search", "url": myURL + "/?s=/"},
    {"label": "Privacy Policy", "url": myURL + "/privacy-policy/"},
    {"label": "Terms & Conditions", "url": myURL + "/terms-conditions/"},

    // SITEMAP (PLUGIN)
    {"label": "Sitemap", "url": myURL + "/sitemap/"},

    // PAGES
    {"label": "About", "url": myURL + "/about/"},
    {"label": "Board of Directors", "url": myURL + "/about/board-of-directors/"},
    {"label": "Team", "url": myURL + "/about/team/"},
    {"label": "Contact", "url": myURL + "/contact/"},
    {"label": "Donate", "url": myURL + "/donate/"},
    {"label": "Eligbility", "url": myURL + "/eligibility/"},
    {"label": "FAQs", "url": myURL + "/frequently-asked-questions/"},
    {"label": "Get Involved", "url": myURL + "/get-involved/"},
    {"label": "Volunteer", "url": myURL + "/get-involved/volunteer/"},
    {"label": "Services", "url": myURL + "/services/"},
    {"label": "Services - Adults", "url": myURL + "/services/adults"},
    {"label": "Services - GAP Services", "url": myURL + "/services/gap-services"},
    {"label": "Services - Seniors", "url": myURL + "/services/seniors"},
    {"label": "Services - Social College", "url": myURL + "/services/social-college"},
    {"label": "Services - Social Focus", "url": myURL + "/services/social-focus"},
    {"label": "Services - Social Growth", "url": myURL + "/services/social-growth"},
    {"label": "Services - Young Adults", "url": myURL + "/services/young-adults"},

    // CATEGORIES
    // {"label": "Category - Administration", "url": myURL + "/category/administration/"},
    // {"label": "Category - Regional Program Coordinators", "url": myURL + "/category/regional-program-coordinators/"},

    // CUSTOM POST TYPES
    {"label": "Archive - Event", "url": myURL + "/event/"},
    {"label": "Archive - Team", "url": myURL + "/team/"},
    {"label": "Archive - Resource", "url": myURL + "/resource/"},
  ];

  return myScenarios;
}
