--
-- PostgreSQL database dump
--

-- Dumped from database version 17.2
-- Dumped by pg_dump version 17.2

-- Started on 2024-12-05 13:01:43

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 5045 (class 0 OID 17170)
-- Dependencies: 235
-- Data for Name: accommodations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.accommodations (acc_id, acc_name, acc_state, created_at, updated_at) FROM stdin;
1	Sencilla	t	\N	\N
2	Doble	t	\N	\N
3	Triple	t	\N	\N
4	Cuádruple	t	\N	\N
\.


--
-- TOC entry 5033 (class 0 OID 17103)
-- Dependencies: 223
-- Data for Name: cache; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.cache (key, value, expiration) FROM stdin;
\.


--
-- TOC entry 5034 (class 0 OID 17110)
-- Dependencies: 224
-- Data for Name: cache_locks; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.cache_locks (key, owner, expiration) FROM stdin;
\.


--
-- TOC entry 5041 (class 0 OID 17147)
-- Dependencies: 231
-- Data for Name: cities; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.cities (cit_id, cit_name, cit_state, created_at, updated_at) FROM stdin;
1	Bogotá	t	\N	\N
2	Medellín	t	\N	\N
\.


--
-- TOC entry 5039 (class 0 OID 17135)
-- Dependencies: 229
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
\.


--
-- TOC entry 5043 (class 0 OID 17155)
-- Dependencies: 233
-- Data for Name: hotels; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.hotels (hot_id, hot_name, hot_quantity_rooms, cit_id, hot_address, hot_nit, hot_state, created_at, updated_at) FROM stdin;
2	Hotel Almendra	10	2	Carrera 789	12345678-2	f	2024-12-04 20:29:12	2024-12-04 20:30:49
1	Hotel Almendra 2	10	1	Carrera 789	12345678-1	t	2024-12-04 17:09:08	2024-12-05 01:08:11
3	probando	1	1	asaas	123123	t	2024-12-05 01:21:56	2024-12-05 01:28:00
4	probadndo 1	1	2	carrera	12345678-4	t	2024-12-05 05:30:17	2024-12-05 05:33:09
\.


--
-- TOC entry 5037 (class 0 OID 17127)
-- Dependencies: 227
-- Data for Name: job_batches; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.job_batches (id, name, total_jobs, pending_jobs, failed_jobs, failed_job_ids, options, cancelled_at, created_at, finished_at) FROM stdin;
\.


--
-- TOC entry 5036 (class 0 OID 17118)
-- Dependencies: 226
-- Data for Name: jobs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.jobs (id, queue, payload, attempts, reserved_at, available_at, created_at) FROM stdin;
\.


--
-- TOC entry 5028 (class 0 OID 16389)
-- Dependencies: 218
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.migrations (id, migration, batch) FROM stdin;
49	0001_01_01_000000_create_users_table	1
50	0001_01_01_000001_create_cache_table	1
51	0001_01_01_000002_create_jobs_table	1
52	2024_12_04_043747_cities	1
53	2024_12_04_043943_hotels	1
54	2024_12_04_044227_accommodations	1
55	2024_12_04_044322_room_types	1
56	2024_12_04_044448_rooms	1
57	2024_12_04_052033_create_personal_access_tokens_table	1
58	2024_12_04_161051_room_type_accommodation	1
\.


--
-- TOC entry 5031 (class 0 OID 17087)
-- Dependencies: 221
-- Data for Name: password_reset_tokens; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.password_reset_tokens (email, token, created_at) FROM stdin;
\.


--
-- TOC entry 5051 (class 0 OID 17209)
-- Dependencies: 241
-- Data for Name: personal_access_tokens; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.personal_access_tokens (id, tokenable_type, tokenable_id, name, token, abilities, last_used_at, expires_at, created_at, updated_at) FROM stdin;
\.


--
-- TOC entry 5053 (class 0 OID 17221)
-- Dependencies: 243
-- Data for Name: room_type_accommodation; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.room_type_accommodation (rta_id, rty_id, acc_id, rta_state, created_at, updated_at) FROM stdin;
1	1	1	1	\N	\N
2	1	2	1	\N	\N
3	2	3	1	\N	\N
4	2	4	1	\N	\N
5	3	1	1	\N	\N
6	3	2	1	\N	\N
7	3	3	1	\N	\N
\.


--
-- TOC entry 5047 (class 0 OID 17178)
-- Dependencies: 237
-- Data for Name: room_types; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.room_types (rty_id, rty_name, rty_state, created_at, updated_at) FROM stdin;
1	Estándar	t	\N	\N
2	Junior	t	\N	\N
3	Suite	t	\N	\N
\.


--
-- TOC entry 5049 (class 0 OID 17186)
-- Dependencies: 239
-- Data for Name: rooms; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.rooms (roo_id, hot_id, acc_id, rty_id, roo_quantity, roo_state, created_at, updated_at) FROM stdin;
1	1	1	3	1	t	2024-12-04 17:10:40	2024-12-04 17:13:10
4	1	2	3	1	t	2024-12-05 04:54:06	2024-12-05 04:54:06
2	1	3	3	1	t	2024-12-04 17:10:55	2024-12-05 05:07:37
3	1	1	1	1	t	2024-12-04 20:31:37	2024-12-05 05:13:44
5	4	1	1	1	t	2024-12-05 05:33:26	2024-12-05 05:33:26
\.


--
-- TOC entry 5032 (class 0 OID 17094)
-- Dependencies: 222
-- Data for Name: sessions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.sessions (id, user_id, ip_address, user_agent, payload, last_activity) FROM stdin;
w7d9VWiaoRqp6jDjciqzWWnIo0XxN0D5fS0cpbDZ	\N	127.0.0.1	PostmanRuntime/7.43.0	YTozOntzOjY6Il90b2tlbiI7czo0MDoiMEI0UXo2WExmSm1COHllRU45aWlqWWY3VnpPbHVRZHNwSEwwTmNMNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=	1733334319
\.


--
-- TOC entry 5030 (class 0 OID 17077)
-- Dependencies: 220
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at) FROM stdin;
\.


--
-- TOC entry 5070 (class 0 OID 0)
-- Dependencies: 234
-- Name: accommodations_acc_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.accommodations_acc_id_seq', 1, false);


--
-- TOC entry 5071 (class 0 OID 0)
-- Dependencies: 230
-- Name: cities_cit_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.cities_cit_id_seq', 1, false);


--
-- TOC entry 5072 (class 0 OID 0)
-- Dependencies: 228
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- TOC entry 5073 (class 0 OID 0)
-- Dependencies: 232
-- Name: hotels_hot_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.hotels_hot_id_seq', 4, true);


--
-- TOC entry 5074 (class 0 OID 0)
-- Dependencies: 225
-- Name: jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.jobs_id_seq', 1, false);


--
-- TOC entry 5075 (class 0 OID 0)
-- Dependencies: 217
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.migrations_id_seq', 58, true);


--
-- TOC entry 5076 (class 0 OID 0)
-- Dependencies: 240
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 1, false);


--
-- TOC entry 5077 (class 0 OID 0)
-- Dependencies: 242
-- Name: room_type_accommodation_rta_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.room_type_accommodation_rta_id_seq', 7, true);


--
-- TOC entry 5078 (class 0 OID 0)
-- Dependencies: 236
-- Name: room_types_rty_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.room_types_rty_id_seq', 1, false);


--
-- TOC entry 5079 (class 0 OID 0)
-- Dependencies: 238
-- Name: rooms_roo_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.rooms_roo_id_seq', 5, true);


--
-- TOC entry 5080 (class 0 OID 0)
-- Dependencies: 219
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 1, false);


-- Completed on 2024-12-05 13:01:44

--
-- PostgreSQL database dump complete
--

