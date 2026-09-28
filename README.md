# WordPress SEO Agent

MVP workflow:
URL -> WordPress REST API -> content/topic -> keyword research -> AI metadata -> validation -> human approval -> WordPress update -> verification -> report.

## Setup
1. Install Python 3.11+.
2. Create a WordPress Application Password for a dedicated editor account.
3. Install dependencies:
   `pip install -r requirements.txt`
4. Copy `.env.example` to `.env` and fill in the credentials.
5. Run:
   `uvicorn app.main:app --reload`
6. Open `http://127.0.0.1:8000`.

Tavily is used for keyword/search research when `TAVILY_API_KEY` is configured.

## WordPress SEO meta fields
The normal WordPress REST API does not automatically expose SEO-plugin fields for writing. The included `wordpress-seo-agent.php` registers Yoast fields. For Rank Math, change the two environment meta keys to:
`_rank_math_title`
`_rank_math_description`

Use a dedicated WordPress user with minimum permissions. Keep approval enabled in production.

## API
POST `/api/analyze` with `{"url":"https://example.com/page/"}`

POST `/api/approve/{run_id}` to apply the proposed metadata and verify it.

GET `/api/runs/{run_id}` to retrieve the report.

## Next production upgrades
Authentication, PostgreSQL, Search Console data, sitemap/bulk mode, internal-link analysis, schema checks, scheduled scans, audit logs, role-based access, and a richer approval screen.
