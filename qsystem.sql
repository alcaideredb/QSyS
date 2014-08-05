--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: admin; Type: TABLE; Schema: public; Owner: qadmin; Tablespace: 
--

CREATE TABLE admin (
    username text,
    password text,
    account_type character(1),
    is_processing integer
);


ALTER TABLE public.admin OWNER TO qadmin;

--
-- Name: next_slot; Type: SEQUENCE; Schema: public; Owner: qadmin
--

CREATE SEQUENCE next_slot
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.next_slot OWNER TO qadmin;

--
-- Name: next_slot_day1; Type: SEQUENCE; Schema: public; Owner: qadmin
--

CREATE SEQUENCE next_slot_day1
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.next_slot_day1 OWNER TO qadmin;

--
-- Name: next_slot_day2; Type: SEQUENCE; Schema: public; Owner: qadmin
--

CREATE SEQUENCE next_slot_day2
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.next_slot_day2 OWNER TO qadmin;

--
-- Name: next_slot_day3; Type: SEQUENCE; Schema: public; Owner: qadmin
--

CREATE SEQUENCE next_slot_day3
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.next_slot_day3 OWNER TO qadmin;

--
-- Name: slots; Type: TABLE; Schema: public; Owner: qadmin; Tablespace: 
--

CREATE TABLE slots (
    slot_id integer,
    student_id integer NOT NULL,
    day_id integer
);


ALTER TABLE public.slots OWNER TO qadmin;

--
-- Name: student_id_seq; Type: SEQUENCE; Schema: public; Owner: qadmin
--

CREATE SEQUENCE student_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.student_id_seq OWNER TO qadmin;

--
-- Name: user_id_seq; Type: SEQUENCE; Schema: public; Owner: qadmin
--

CREATE SEQUENCE user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.user_id_seq OWNER TO qadmin;

--
-- Name: users; Type: TABLE; Schema: public; Owner: qadmin; Tablespace: 
--

CREATE TABLE users (
    id integer DEFAULT nextval('student_id_seq'::regclass) NOT NULL,
    student_num integer NOT NULL,
    name text,
    logged_in boolean DEFAULT false,
    birthday date,
    pin_num text NOT NULL,
    nickname text
);


ALTER TABLE public.users OWNER TO qadmin;

--
-- Data for Name: admin; Type: TABLE DATA; Schema: public; Owner: qadmin
--

COPY admin (username, password, account_type, is_processing) FROM stdin;
jen	ac32f600827910984f686ff3a7419a7c	c	\N
\.


--
-- Name: next_slot; Type: SEQUENCE SET; Schema: public; Owner: qadmin
--

SELECT pg_catalog.setval('next_slot', 24, true);


--
-- Name: next_slot_day1; Type: SEQUENCE SET; Schema: public; Owner: qadmin
--

SELECT pg_catalog.setval('next_slot_day1', 11, true);


--
-- Name: next_slot_day2; Type: SEQUENCE SET; Schema: public; Owner: qadmin
--

SELECT pg_catalog.setval('next_slot_day2', 4, true);


--
-- Name: next_slot_day3; Type: SEQUENCE SET; Schema: public; Owner: qadmin
--

SELECT pg_catalog.setval('next_slot_day3', 2, true);


--
-- Data for Name: slots; Type: TABLE DATA; Schema: public; Owner: qadmin
--

COPY slots (slot_id, student_id, day_id) FROM stdin;
9	201110273	1
4	200910519	2
10	201011658	1
11	20081011	1
\.


--
-- Name: student_id_seq; Type: SEQUENCE SET; Schema: public; Owner: qadmin
--

SELECT pg_catalog.setval('student_id_seq', 114, true);


--
-- Name: user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: qadmin
--

SELECT pg_catalog.setval('user_id_seq', 1, false);


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: qadmin
--

COPY users (id, student_num, name, logged_in, birthday, pin_num, nickname) FROM stdin;
104	201220333	JOHN DOE	f	1992-10-05	73882ab1fa529d7273da0db6b49cc4f3	\N
105	201231231	Arabs Alcaide	f	1992-10-05	367119bd0ec8ec038bc0077df8a42d93	\N
103	201110273	RB ALCAIDE	f	1994-02-10	230cab36e9b7d8047e9771cd5a1b0e6a	arabs
112	200910519	Kier	f	2014-07-21	230cab36e9b7d8047e9771cd5a1b0e6a	brix
113	201011658	Jerick David	f	2014-07-23	f148818614a6657a203c510bd14ef2ab	Jerick
114	20081011	Matthew Allan Rosales	f	2014-08-01	827ccb0eea8a706c4c34a16891f84e7b	Matthew
\.


--
-- Name: oneid; Type: CONSTRAINT; Schema: public; Owner: qadmin; Tablespace: 
--

ALTER TABLE ONLY users
    ADD CONSTRAINT oneid UNIQUE (student_num);


--
-- Name: slots_pkey; Type: CONSTRAINT; Schema: public; Owner: qadmin; Tablespace: 
--

ALTER TABLE ONLY slots
    ADD CONSTRAINT slots_pkey PRIMARY KEY (student_id);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

