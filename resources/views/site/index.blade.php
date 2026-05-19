@extends('layouts.main')

@section('content')
<section
    data-width="180"
    class="menu_bar hero opened"
    style="width: calc(100% - 180px)"
>
    <div
        class="wrapper_header_hero d-flex"
        style="background-image: url(/images/hero_background_image.png)"
    >
        <div
            class="main_header pt-lg-5 d-flex align-items-center flex-row flex-lg-column"
        >
            <div class="mobile_logo">
                <a href="#" class="logo_link">
                    <img
                        class="dark"
                        src="/images/logo_header/dark/logo_header_new_en.svg"
                        alt="Logo"
                    />
                    <img
                        class="light"
                        src="/images/logo_header/light/logo_header_new_en.svg"
                        alt="Logo"
                    />
                </a>
            </div>
            <div
                class="header-actions d-flex align-items-center flex-row flex-lg-column"
            >
                <div class="toggle"></div>
            </div>
        </div>
        <div class="hero-container">
            <div class="logo-container">
                <img
                    class="w-50"
                    src="/images/logo_home/logo_home_new_en.svg"
                    alt="Logo"
                />
            </div>
            <div class="reg_button_container mt-4 mt-md-5 pl-1 pl-md-2">
                <a
                    href="https://95a8f6e7.sibforms.com/serve/MUIFAFNnFlzJwGA0A0f7_DNLkzMeFt3lSeDkMU0Nev9O7WE8y3xupK0e3j4DmHphBPHHDWHiyUoX6TgPAtkcnZowNNA6SYkJIzdTZdB8lHVoYOLBB8TkBhesW0CsZJogWX3TdfTv71RKgpSEjmljKTaPMoTceo5JIQDPfmyv5UvTY6fdi7ExLEYwNHwDx6JUf5Cr2REOV9BhQw08?fbclid=PAZXh0bgNhZW0CMTEAAaeg_ouLeE3RoIBcLCUCruASNTOIkYyKaAp5f6HT7xa9Tfkpy4FAELFbPV7Wjg_aem_nV-i_lS5aLrL6lJW8rFsjA&amp;clckid=daa04bb0"
                    class="reg_button"
                    target="_blank"
                >
                    Subscribe to newsletter ↘
                </a>
            </div>

            <div class="hero-text">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <p>
                            Where coexistence <br />
                            sustains the planet
                        </p>
                    </div>
                    <div class="col-12 col-md-6">
                        <p class="text-end">Autumn<br />2026</p>
                    </div>
                </div>
            </div>

            <!-- Social Media -->
            <div class="social_media_links">
                <a
                    href="https://www.instagram.com/aral.culture.summit/"
                    class="social_link"
                    title="instagram"
                    target="_blank"
                    aria-label="instagram"
                >
                    <i class="fab fa-instagram fa-2x"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="hero_content d-flex">
        <div class="hero_content_header">
            <span>Overview</span>
        </div>
        <div class="main_content">
            <div class="main_section_hero">
                <div class="introduction_block">
                    <div class="introduction_block_title">
                        <p>
                            ARAL CULTURE SUMMIT IS AN EMERGENT INITIATIVE DEDICATED TO
                            THE SOCIAL AND ENVIRONMENTAL TRANSFORMATION OF THE ARAL
                            SEA REGION THROUGH ART, CULTURE, SCIENCE, AND DESIGN.
                        </p>
                    </div>
                    <div class="introduction_content">
                        <div class="image">
                            <a
                                href="https://aralculturesummit.uz/uploads/images/page-sections/1/photo_56b79218dcf39a70daaad644990064ce.png"
                                data-fancybox="gallery"
                                class="d-flex align-items-center w-100"
                            >
                                <img
                                    src="https://aralculturesummit.uz/uploads/images/page-sections/1/photo_56b79218dcf39a70daaad644990064ce.png"
                                    width="75%"
                                    alt="image"
                                />
                            </a>
                        </div>
                        <div class="text_block">
                            <h2>The Summit</h2>
                            <p>
                                Aral Culture Summit brings together local and
                                international activists, artists and scientists to
                                explore and implement ecological, social and cultural
                                pathways to sustainable development of Karakalpakstan.
                            </p>
                            <p>
                                It will act as both an itinerant platform for exchanging
                                ideas and a placemaking initiative to revive the
                                regional landscape and strengthen the community
                                identity, while attracting new businesses that align
                                with the principles of circular economy, creating
                                sustainable economic growth.
                            </p>
                        </div>
                        <div class="text_block">
                            <h2>The Mission</h2>
                            <p>
                                Aral Culture Summit aims to draw attention to the
                                ecological challenges and opportunities in and around
                                Karakalpakstan, empower and unite the local community,
                                and evolve the region into an environmentally
                                sustainable and culturally enriching destination.
                            </p>
                        </div>
                    </div>
                    <div class="embed-responsive">
                        <iframe
                            width="100%"
                            height="700"
                            src="https://www.youtube.com/embed/ShbkMi0sIAI?si=8qWELUYukPF66h9y"
                            title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share;"
                            referrerpolicy="strict-origin-when-cross-origin"
                            allowfullscreen=""
                        ></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section data-width="180" class="menu_bar research">
    <div class="section_header">
        <p class="first_title">Research</p>
    </div>
    <div class="main_section">
        <div class="main_section_header">
            <div class="section_logo">
                <a href="/" class="logo_link">
                    <img
                        class="logo_image_header dark"
                        src="/images/logo_header/dark/logo_header_new_en.svg"
                        alt="Logo"
                    />
                    <img
                        class="logo_image_header light"
                        src="/images/logo_header/light/logo_header_new_en.svg"
                        alt="Logo"
                    />
                </a>
            </div>
            <div class="header_navigation">
                <ul>
                    <li>
                        <a href="#books" class="navigation_link scroll-link">
                            Books
                        </a>
                    </li>
                    <li>
                        <a href="#articles" class="navigation_link scroll-link">
                            Articles
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav_link back_link"> ← Back </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="main_section_hero">
            <div class="research_books" id="books">
                <h2 class="section_title">Books</h2>
                <div class="research_header">
                    <div class="col">Name</div>
                    <div class="col">Author</div>
                    <div class="col">Access</div>
                </div>

                <div class="books_accordion">
                    <div class="accordion_item">
                        <div class="accordion_header">
                            <div class="accordion_name">
                                Aral: Untold Stories from Before, During and After the Sea
                            </div>
                            <div class="accordion_author">Aral Culture Summit</div>
                            <div class="accordion_actions">
                                <ul class="actions">
                                    <li>
                                        <a
                                            href="https://aralculturesummit.uz/uploads/files/books/2/ARAL ~ Untold Stories from Before, During and After the Sea_023c561c.pdf"
                                            class="action_link"
                                            target="_blank"
                                        >
                                            Download
                                        </a>
                                    </li>
                                </ul>
                                <button
                                    type="button"
                                    class="accordion_open"
                                    data-text-open="Read less"
                                    data-text-closed="Read more"
                                >
                                    Read more
                                </button>
                            </div>
                        </div>
                        <div class="accordion_content">
                            <div class="content_row row">
                                <div class="col-xl-6 col-12">
                                    <div class="accordion_texts">
                                        <p style="color: rgb(0, 0, 0)">
                                            <span style="font-size: 24px"
                                                >"Aral: Untold Stories from Before, During and
                                                After the Sea" begins with a simple question:
                                                what is something you wish people knew about the
                                                Aral Sea region that they don't already?</span
                                            >
                                        </p>
                                        <p style="color: rgb(0, 0, 0)"><br /></p>
                                        <p style="color: rgb(0, 0, 0)">
                                            From there more complex questions emerge: How is
                                            it we know that the water level of the Aral Sea
                                            has fallen and risen multiple times in the past?
                                            Did the divine priest Zarathushtra, father of
                                            Zoroastrianism, gaze out upon the Aral's vast
                                            waters? Why did Igor Savitsky choose Nukus,
                                            capital city of Karakalpakstan, to display and
                                            preserve his treasure trove of textiles,
                                            jewellery, ornaments and dissident art?
                                        </p>
                                        <p style="color: rgb(0, 0, 0)"><br /></p>
                                        <p style="color: rgb(0, 0, 0)">
                                            One way or another, it all comes down to the Aral,
                                            and in this new book of essays, commissioned for
                                            the inaugural Aral Culture Summit, voices from
                                            Uzbekistan and beyond share their stories about
                                            the Aral Sea region, a place that is far more
                                            diverse, complex and inspiring than global
                                            headlines often allow.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-12">
                                    <div class="accordion_image">
                                        <img
                                            src="https://aralculturesummit.uz/uploads/images/books/2/photo_3ab3caa1d5e6c86a3e68622f47e277a0.jpg"
                                            alt="Aral: Untold Stories from Before, During and After the Sea"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="research_articles" id="articles">
                <h2 class="section_title">Articles</h2>

                <div class="articles_row row">
                    <div class="col-md-6 gy-lg-4 gy-3">
                        <div class="article">
                            <div class="article_image">
                                <img
                                    src="https://aralculturesummit.uz/uploads/images/articles/8/thumbs/photo_08b1def50f1629b193cc2defb5720123.jpg"
                                    alt="Culture, Climate, and Clean Water: Summit Outlines New Efforts to Restore the Aral Sea Region"
                                />
                            </div>
                            <div class="article_date">April 07, 2025</div>
                            <div class="article_title">
                                Culture, Climate, and Clean Water: Summit Outlines New
                                Efforts to Restore the Aral Sea Region
                            </div>
                            <button type="button" class="article_link" data-id="8">
                                Read article
                            </button>
                        </div>
                    </div>

                    <div class="col-md-6 gy-lg-4 gy-3">
                        <div class="article">
                            <div class="article_image">
                                <img
                                    src="https://aralculturesummit.uz/uploads/images/articles/9/thumbs/photo_5a0676ddfe4b11b4a84eb6bf5bbbf668.jpg"
                                    alt="Aral Sea crisis: Uzbekistan launches Aral Culture Summit to boost development in the region"
                                />
                            </div>
                            <div class="article_date">April 07, 2025</div>
                            <div class="article_title">
                                Aral Sea crisis: Uzbekistan launches Aral Culture Summit
                                to boost development in the region
                            </div>
                            <button type="button" class="article_link" data-id="9">
                                Read article
                            </button>
                        </div>
                    </div>

                    <div class="col-md-6 gy-lg-4 gy-3">
                        <div class="article">
                            <div class="article_image">
                                <img
                                    src="https://aralculturesummit.uz/uploads/images/articles/7/thumbs/photo_31c7aa203815a80902f5c4761fa99b35.png"
                                    alt="Aral Culture Summit: Culture as a Catalyst for Environmental Renewal"
                                />
                            </div>
                            <div class="article_date">April 04, 2025</div>
                            <div class="article_title">
                                Aral Culture Summit: Culture as a Catalyst for
                                Environmental Renewal
                            </div>
                            <button type="button" class="article_link" data-id="7">
                                Read article
                            </button>
                        </div>
                    </div>

                    <div class="col-md-6 gy-lg-4 gy-3">
                        <div class="article">
                            <div class="article_image">
                                <img
                                    src="https://aralculturesummit.uz/uploads/images/articles/5/thumbs/photo_745e1fa165fcb8043b63bc494adffb70.jpg"
                                    alt="Central Asian and EU leaders visit Aral Culture Summit exhibit"
                                />
                            </div>
                            <div class="article_date">April 04, 2025</div>
                            <div class="article_title">
                                Central Asian and EU leaders visit Aral Culture Summit
                                exhibit
                            </div>
                            <button type="button" class="article_link" data-id="5">
                                Read article
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="article_section"></div>
    </div>
</section>

<section data-width="180" class="menu_bar archive">
    <div class="section_header">
        <p class="first_title">Archive</p>
    </div>
    <div class="main_section">
        <div class="main_section_header">
            <div class="section_logo">
                <a href="/" class="logo_link">
                    <img
                        class="logo_image_header dark"
                        src="/images/logo_header/dark/logo_header_new_en.svg"
                        alt="Logo"
                    />
                    <img
                        class="logo_image_header light"
                        src="/images/logo_header/light/logo_header_new_en.svg"
                        alt="Logo"
                    />
                </a>
            </div>
            <div class="header_navigation">
                <ul>
                    <li>
                        <button
                            type="button"
                            class="navigation_link active"
                            data-year="2025"
                        >
                            2025
                        </button>
                    </li>
                </ul>
            </div>
        </div>

        <div class="section_content">
            <div class="section_title">Aral Сulture Summit 2025</div>
            <div class="section_description">
                The inaugural Aral Culture Summit, a cultural
                and&nbsp;environmental initiative dedicated to revitalising the
                Aral Sea&nbsp;region in Central Asia, took place across two
                cities in Uzbekistan&nbsp;from 4-6 April 2025. Organised by the
                Uzbekistan Art and&nbsp;Culture Development Foundation (ACDF),
                the Summit takes&nbsp;place every 18 months and seeks to foster
                dialogue and action&nbsp;through art, culture, design, and
                science.
            </div>

            <div class="archive_content">
                <h2>
                    Nukus, Karakalpakstan
                    <br />
                    April 4–6th, 2025
                </h2>
                <p>
                    Aral Culture Summit 2025 brought together leading
                    cultural&nbsp;figures, policymakers, artists, and
                    environmental experts&nbsp;to explore and implement
                    sustainable solutions that address&nbsp;the Aral Sea crisis
                    and global climate challenges. Aral Culture Summit
                    was&nbsp;inaugurated during the first Global Climate Forum in
                    Samarkand&nbsp;(4th April), attended by regional and European
                    heads-of-states.
                </p>
                <p>
                    It continued in Nukus, Karakalpakstan near the Aral Sea
                    with&nbsp;a two-day, multidisciplinary programme of panel
                    discussions,&nbsp;keynotes, artistic performances, and
                    exhibitions, addressing&nbsp;critical issues such as
                    environmental regeneration, creative&nbsp;economy, and
                    cultural diplomacy.
                </p>
                <p>
                    The next Aral Culture Summit will be held in October 2026.
                </p>
                <p>
                    <iframe
                        frameborder="0"
                        src="https://www.youtube.com/embed/EphQoSom30c"
                        width="640"
                        height="360"
                        class="note-video-clip"
                    ></iframe>
                </p>
            </div>
        </div>

        <div class="archive_programs">
            <div class="programs_title">SUMMIT PROGRAMME 4–6 April</div>

            <div class="programs_accordion">
                <div class="custom_accordion">
                    <div class="accordion_date">4 April, Friday</div>

                    <div class="accordion_item_wrapper" style="display: none">
                        <div class="programs_accordion__item">
                            <div class="accordion_content">
                                <div class="accordion__title">
                                    Opening ceremony ~ EU–Central Asia Climate Forum in
                                    Samarkand
                                </div>
                                <div class="accordion__body">
                                    <p>
                                        —&nbsp;<b>Shavkat Mirziyoyev,</b>&nbsp;President of
                                        Uzbekistan<br />—&nbsp;<b>Kassym-Jomart Tokayev,</b
                                        >&nbsp;President of Kazakhstan<br />—&nbsp;<b
                                            >Sadyr Japarov,</b
                                        >&nbsp;President of Kyrgyzstan<br />—&nbsp;<b
                                            >Emomali Rahmon,</b
                                        >&nbsp;President of Tajikistan <br />—&nbsp;<b
                                            >Serdar Berdimuhamedow,</b
                                        >&nbsp;President of Turkmenistan<br />—&nbsp;<b
                                            >Ursula von der Leyen,</b
                                        >&nbsp;The head of the European Commission<br />—&nbsp;<b
                                            >António Costa,</b
                                        >&nbsp;President of the European Council&nbsp;
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="programs_accordion__item">
                            <div class="accordion_content">
                                <div class="accordion__title">
                                    Climate Change in Focus: Shaping the Future through
                                    Collective Action ~ EU–Central Asia Climate Forum in
                                    Samarkand
                                </div>
                                <div class="accordion__body">
                                    <p></p>
                                    <div class="page" title="Page 3">
                                        <div class="section">
                                            <div class="layoutArea">
                                                <div class="column">
                                                    <p>
                                                        — Saida Mirziyoyeva, Assistant to the
                                                        President of the Republic of Uzbekistan<br />—
                                                        Mukhtar Babaev, Climate Issues
                                                        Representative of the President of the
                                                        Republic of Azerbaijan, COP29 President<br />—
                                                        Yasmine Fouad, Minister of Environment of
                                                        the Arab Republic of Egypt<br />— AnaClaudia
                                                        Rossbach, United Nations
                                                        Under-Secretary-General, Executive Director
                                                        of UN-Habitat<br />— Tatiana Molcean,
                                                        Under-Secretary- General of the United
                                                        Nations and Executive Secretary of UNECE<br />—
                                                        Ivana Živković, Assistant Secretary-
                                                        General, Assistant Administrator, and
                                                        Director of the UNDP Regional Bureau for
                                                        Europe and CIS<br />— Ibrahim Thiaw,
                                                        Under-Secretary-General of the United
                                                        Nations and Executive Secretary of UNCCD<br />—
                                                        Amy Fraenkel, Executive Secretary,
                                                        Convention on the Conservation of Migratory
                                                        Species of Wild Animals (CMS)<br />— Megumi
                                                        Seki, Executive Secretary of the UNEP Ozone
                                                        Secretariat<br />— Sang-hyup Kim, Director
                                                        General, GGGI
                                                    </p>
                                                    <p>
                                                        Moderator: Sabine Machl, United Nations
                                                        Resident Coordinator in Uzbekistan&nbsp;
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="custom_accordion">
                    <div class="accordion_date">5 April, Saturday</div>

                    <div class="accordion_item_wrapper" style="display: none">
                        <div class="programs_accordion__item">
                            <div class="accordion_content">
                                <div class="accordion__title">Opening remarks</div>
                                <div class="accordion__body">
                                    <p>
                                        — Opening remarks by Saida Mirziyoyeva, Assistant to
                                        the President of the Republic of Uzbekistan<br />—
                                        Opening remarks by the government of
                                        Karakalpakstan<br />— Opening remarks by Gayane
                                        Umerova, Chairperson of the Uzbekistan Art and
                                        Culture Development Foundation<br />— Opening
                                        remarks by Ivana Živković, Assistant
                                        Secretary-General, Assistant and Director of the
                                        Regional Bureau for Europe and CIS (UNDP)<br />—
                                        Valéry Freland, Executive Director of ALIPH
                                        Foundation
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="programs_accordion__item">
                            <div class="accordion_content">
                                <div class="accordion__title">
                                    Culture, architecture, and heritage: catalysts for
                                    climate action
                                </div>
                                <div class="accordion__body">
                                    <p>— Gayane Umerova, Chairperson of the Foundation for the Development of Culture and Art of Uzbekistan</p>
                                    <p>— Valéry Freland, Executive Director of ALIPH Foundation</p>
                                    <p>— Jan Boelen, Programme Director of Aral School</p>
                                    <p>— Oktyabr Dospanov, Head of the Archaeology Department, State Museum of Arts named after I.V. Savitsky, Uzbekistan</p>
                                    <p>Moderator: Aric Chen, Artistic Director of Nieuwe Instituut</p>
                                </div>
                            </div>
                        </div>
                        <div class="programs_accordion__item">
                            <div class="accordion_content">
                                <div class="accordion__title">
                                    Keynote by Bas Smets, landscape architect, Belgium
                                </div>
                                <div class="accordion__body"></div>
                            </div>
                        </div>
                        <div class="programs_accordion__item">
                            <div class="accordion_content">
                                <div class="accordion__title">
                                    Beyond sustainability: designing the future with
                                    nature, art, and technology
                                </div>
                                <div class="accordion__body">
                                    <p>— Maurizio Montalti, Officina Corpuscoli, Italy</p>
                                    <p>— Dana Molzhigit, Bio-designer, Founder of Ancient Futures, Kazakhstan</p>
                                    <p>— Ross Lovegrove, designer, with a focus on biotechnology, UAE</p>
                                    <p>— Saidbek Sabirbayev, Karakalpak artist, participant of the first residency cohort at the Center for Contemporary Art, Uzbekistan</p>
                                    <p>Moderator: Cyril Zammit, Design Advisor</p>
                                </div>
                            </div>
                        </div>
                        <div class="programs_accordion__item">
                            <div class="accordion_content">
                                <div class="accordion__title">
                                    Keynote of Marinika Babanazarova, former Director of
                                    the State Museum of Art named after I.V. Savitsky,
                                    Uzbekistan
                                </div>
                                <div class="accordion__body"></div>
                            </div>
                        </div>
                        <div class="programs_accordion__item">
                            <div class="accordion_content">
                                <div class="accordion__title">
                                    Cultivating agriculture as culture
                                </div>
                                <div class="accordion__body">
                                    <p>— Dilfuza Egamberdieva, Head of the Laboratory of Biological Research and Food Safety, TIIAME, Uzbekistan</p>
                                    <p>— Joshua Evans, Senior Researcher &amp; Group Leader, Sustainable Food Innovation Group, Center for Biosustainability, Technical University of Denmark</p>
                                    <p>— Elena Kan, KIVA Center, Uzbekistan</p>
                                    <p>— Murod Khusanov, Founder and CEO of Growz, Uzbekistan</p>
                                    <p>Moderator: Philip Maughan, Writer and Journalist, UK</p>
                                </div>
                            </div>
                        </div>
                        <div class="programs_accordion__item">
                            <div class="accordion_content">
                                <div class="accordion__title">
                                    Gala concert 'The Sands of Time' with Kirill Richter
                                    and National Symphonic Orchestra at Shilpiq Qala
                                </div>
                                <div class="accordion__body"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="custom_accordion">
                    <div class="accordion_date">6 April, Sunday</div>

                    <div class="accordion_item_wrapper" style="display: none">
                        <div class="programs_accordion__item">
                            <div class="accordion_content">
                                <div class="accordion__title">
                                    Winds of change: climate, communities, and the future
                                    of Central Asia
                                </div>
                                <div class="accordion__body">
                                    <p>— Antonina van Lier, Co-director of Save Balkhash, Artcom Platform, Kazakhstan</p>
                                    <p>— Gulmira Esengeldieva, Climate Change Program Coordinator, MoveGreen, Kyrgyzstan</p>
                                    <p>— Nargis Kasymova, Chief Editor of <a href="http://ekolog.uz/" target="_blank">EKOLOG.UZ</a>, Uzbekistan</p>
                                    <p>— Natalia Idrisova, curator of the "Polygon" Art Group, Tajikistan</p>
                                    <p>— Oscar Fraser Turner, co-founder of Amu Darya Project, UK</p>
                                    <p>Moderator: Gulnara Khudaybergenova, Project Manager, CAN EECCA, Uzbekistan</p>
                                </div>
                            </div>
                        </div>
                        <div class="programs_accordion__item">
                            <div class="accordion_content">
                                <div class="accordion__title">
                                    Reviving biodiversity and sustaining water for
                                    resilient ecosystems in Aral sea region
                                </div>
                                <div class="accordion__body">
                                    <p>— Islambek Arepbayev, Doctor of biological sciences, Wildlife Karakalpakstan, Uzbekistan</p>
                                    <p>— Laura Becker, MEL team coordinator, The International Center for Agricultural Research in the Dry Areas, Iceland/USA</p>
                                    <p>— Nabi Agzamov, Architect, Researcher at 5th Studio, Uzbekistan/UK</p>
                                    <p>— Ollivier Rasmus, Chief Operating Officer Central Asia and Caucasus, SUEZ, France</p>
                                    <p>Moderator: Selbi Jumayeva, research and development strategist, Turkmenistan</p>
                                </div>
                            </div>
                        </div>
                        <div class="programs_accordion__item">
                            <div class="accordion_content">
                                <div class="accordion__title">
                                    Keynote of Marinika Sagdyan, architect and researcher,
                                    France
                                </div>
                                <div class="accordion__body"></div>
                            </div>
                        </div>
                        <div class="programs_accordion__item">
                            <div class="accordion_content">
                                <div class="accordion__title">
                                    Revitalising the Aral sea region
                                </div>
                                <div class="accordion__body">
                                    <p>— Robert Willard, Director of World Aral Sea Charity</p>
                                    <p>— Vadim Sokolov, Head of the Agency for the Implementation of Projects of the International Fund for Saving the Aral Sea (IFAS)</p>
                                    <p>— Murat Mustapaev, Project Manager for Karakalpakstan, UNDP</p>
                                    <p>— Bakhitjan Khabibullaev, Director of IICAS, Uzbekistan</p>
                                    <p>Moderator: Ayzada Uzakhbaeva, Regional manager for Karakalpakstan, GIZ</p>
                                </div>
                            </div>
                        </div>
                        <div class="programs_accordion__item">
                            <div class="accordion_content">
                                <div class="accordion__title">
                                    From challenges to opportunities: new ventures for the
                                    Aral sea region
                                </div>
                                <div class="accordion__body">
                                    <p>— Azamat Matkarimov, Entrepreneur, European Bank for Reconstruction and Development (EBRD), Uzbekistan</p>
                                    <p>— Beknazar Abdikamalov, co-founder and CTO, Hupo, Uzbekistan</p>
                                    <p>— Erlan Kereev, Project Manager, Technopark Karakalpakstan, Uzbekistan</p>
                                    <p>— Yusup Kamalov, Chairman of the Aral and Amu Darya Protection Union</p>
                                    <p>Moderator: Alisher Fayzullaev, Regional Director of IT park Karakalpakstan, Uzbekistan</p>
                                </div>
                            </div>
                        </div>
                        <div class="programs_accordion__item">
                            <div class="accordion_content">
                                <div class="accordion__title">
                                    Media today: driving change through content
                                </div>
                                <div class="accordion__body">
                                    <p>— Guljakhan Kalmuratova, content creator, founder of <a href="http://qarashay.kr/" target="_blank">Qarashay.kr</a> blog</p>
                                    <p>— Sultanbek Muratniyazov, content creator</p>
                                    <p>— Mutabar Khushvaktova, eco-activist, content creator</p>
                                    <p>— Islambek Arepbayev, doctor of biological sciences, wildlife photographer, Uzbekistan</p>
                                    <p>— Otabek Suleymanov, CEO of Stihia Festival</p>
                                    <p>Moderator: Kamal Uteniyazov, content creator, podcaster, founder of Go'je' Media Channel</p>
                                </div>
                            </div>
                        </div>
                        <div class="programs_accordion__item">
                            <div class="accordion_content">
                                <div class="accordion__title">
                                    Women's leadership in the environment: rights,
                                    opportunities, and challenges
                                </div>
                                <div class="accordion__body">
                                    <p>— Kamola Alieva, Lawyer, Women's Rights Expert</p>
                                    <p>— Mukhabat Mamirova, Co-Founder of the First Women's Podcast in Uzbek</p>
                                    <p>— Gulsara Shirmatova, Vice President of the Representative Office in Uzbekistan, The World Aral Region Charity, Inc.</p>
                                    <p>— Gulnaz Abutova, initiator of "Clean Water" Initiative in Karakalpakstan</p>
                                    <p>Moderator: Mutabar Khushvaktova, eco-activist, content creator</p>
                                </div>
                            </div>
                        </div>
                        <div class="programs_accordion__item">
                            <div class="accordion_content">
                                <div class="accordion__title">
                                    Cultural code: how art and tradition shape identity (QQ)
                                </div>
                                <div class="accordion__body">
                                    <p>— Kanat Abdikarimov, publisher and entrepreneur</p>
                                    <p>— Kydirniyaz Babaniyazov, contemporary poet, content creator</p>
                                    <p>— Aygul Pirnazanova, head of the ethnographic department of the Savitsky State Museum of Art</p>
                                    <p>— Aijamal Yusupova, director of the State Museum of History and Culture of the Republic of Karakalpakstan</p>
                                    <p>Moderator: Gulnara Zholdasbaeva, local coordinator, communications manager at the KAS project</p>
                                </div>
                            </div>
                        </div>
                        <div class="programs_accordion__item">
                            <div class="accordion_content">
                                <div class="accordion__title">Closing remarks</div>
                                <div class="accordion__body"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="archive_news">
            <div class="news_row">
                <div class="archive_card">
                    <div class="card_texts">
                        <div class="card_title">Official Inauguration</div>
                        <div class="card_description">
                            Aral Culture Summit was officially inaugurated at the
                            first Global Climate Forum in Samarkand, by decree of the
                            President of Uzbekistan Shavkat Mirziyoyev, during the
                            first meeting between European and Central Asian leaders.
                            European Union President Ursula von der Leyen and
                            President of the European Council António Costa attended
                            alongside leaders from Uzbekistan, Kazakhstan, Kyrgyzstan,
                            Tajikistan and Turkmenistan.
                        </div>
                    </div>
                    <div class="card_image">
                        <img
                            src="https://aralculturesummit.uz/uploads/images/archive-news/1/photo_df8b32560f06f72512afe8a48f5757fa.jpeg"
                            alt="Official Inauguration"
                        />
                    </div>
                </div>

                <div class="archive_card">
                    <div class="card_texts">
                        <div class="card_title">Launch Exhibition in Samarkand</div>
                        <div class="card_description">
                            An exhibition on the Aral Culture Summit was presented in
                            a dedicated pavilion during the Global Climate Forum in
                            Samarkand. Photographer Iwan Baan, commissioned by ACDF,
                            captured the rarely seen architectural heritage, resilient
                            local communities, and striking landscapes of
                            Karakalpakstan.
                        </div>
                    </div>
                    <div class="card_image">
                        <img
                            src="https://aralculturesummit.uz/uploads/images/archive-news/2/photo_3cc5ace802bdd7f1dc47eeb7a6ce252b.png"
                            alt="Launch Exhibition in Samarkand"
                        />
                    </div>
                </div>

                <div class="archive_card">
                    <div class="card_texts">
                        <div class="card_title">Memorandum</div>
                        <div class="card_description">
                            A memorandum of understanding was signed between the
                            Uzbekistan Art and Culture Development Foundation (ACDF)
                            and the United Nations Development Programme (UNDP) to
                            strengthen cooperation for sustainable development in
                            Karakalpakstan.
                        </div>
                    </div>
                    <div class="card_image">
                        <img
                            src="https://aralculturesummit.uz/uploads/images/archive-news/3/photo_ef60b3f467fbd08b5b79adba14013662.png"
                            alt="Memorandum"
                        />
                    </div>
                </div>

                <div class="archive_card">
                    <div class="card_texts">
                        <div class="card_title">
                            The Sands of Time at Shilpiq Qal'a
                        </div>
                        <div class="card_description">
                            Composer Kirill Richter and the Uzbekistan National
                            Symphonic Orchestra performed at a mesmerising Gala
                            Concert called The Sands of Time at a 2000 year old
                            Zoroastrian fortress, Shilpiq Qal'a (or The Tower of
                            Silence) featuring the endangered musical traditions of
                            the kobyz and zhyrau from Karakalpakstan, now being
                            protected by UNESCO.
                        </div>
                    </div>
                    <div class="card_image">
                        <img
                            src="https://aralculturesummit.uz/uploads/images/archive-news/4/photo_4dc8c428d10aa605d48e711c0450da2a.png"
                            alt="The Sands of Time at Shilpiq Qal'a"
                        />
                    </div>
                </div>

                <div class="archive_card">
                    <div class="card_texts">
                        <div class="card_title">
                            Restoration and New Exhibition at The Savitsky Museum
                        </div>
                        <div class="card_description">
                            The Savitsky Museum hosted the official opening of the 3rd
                            floor re-exposition dedicated to its original patron Igor
                            Savitsky on his 110th jubilee year. Often called the
                            'Louvre of the Steppe', the Savitsky Museum houses one of
                            the world's most significant collections of Soviet
                            avant-garde art.
                        </div>
                    </div>
                    <div class="card_image">
                        <img
                            src="https://aralculturesummit.uz/uploads/images/archive-news/5/photo_400d5e613c5398ee72883bfcc9f9fe6a.png"
                            alt="Restoration and New Exhibition at The Savitsky Museum"
                        />
                    </div>
                </div>
            </div>
        </div>

        <div class="gallery swiper mt-5">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="slide_item">
                        <img src="https://aralculturesummit.uz/uploads/images/page-sections/9/photo_2fdedfb891474667418e16ca94c467bc.jpg" alt="" />
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slide_item">
                        <img src="https://aralculturesummit.uz/uploads/images/page-sections/9/photo_fbea47746f3f4fb67b882ca73809597e.jpg" alt="" />
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slide_item">
                        <img src="https://aralculturesummit.uz/uploads/images/page-sections/9/photo_c8c7f56522bcf88a729cb46c23ae499e.jpg" alt="" />
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slide_item">
                        <img src="https://aralculturesummit.uz/uploads/images/page-sections/9/photo_b01f09b402a5f06df243f3c92bfbe452.jpg" alt="" />
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slide_item">
                        <img src="https://aralculturesummit.uz/uploads/images/page-sections/9/photo_254ccedca3415d7b83b1e3be064595c5.jpg" alt="" />
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slide_item">
                        <img src="https://aralculturesummit.uz/uploads/images/page-sections/9/photo_9a103a81f99406452e5c9e98a34f01ce.jpg" alt="" />
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slide_item">
                        <img src="https://aralculturesummit.uz/uploads/images/page-sections/9/photo_c9e407933fb3135db9e6b8ad8422b51d.jpg" alt="" />
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slide_item">
                        <img src="https://aralculturesummit.uz/uploads/images/page-sections/9/photo_366d8ca669e54d57d9bdced6cb79f5cc.jpg" alt="" />
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slide_item">
                        <img src="https://aralculturesummit.uz/uploads/images/page-sections/9/photo_f3fdc6c41979b9ebb1165d626f3e6a9c.jpg" alt="" />
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slide_item">
                        <img src="https://aralculturesummit.uz/uploads/images/page-sections/9/photo_fdde446e9d820740617bd19fea3e5b4f.jpg" alt="" />
                    </div>
                </div>
            </div>
            <div class="swiper_navs">
                <div class="slide_prev"><i class="fas fa-arrow-left"></i></div>
                <div class="slide_next"><i class="fas fa-arrow-right"></i></div>
            </div>
        </div>

        <div class="partners archive">
            <div class="partners_title">Aral Culture Summit Partners</div>
            <div class="partners_logo">
                <div class="partner_logo">
                    <img src="https://aralculturesummit.uz/uploads/images/page-sections/5/photo_158c162be23f2b067311a4ec7a1d00e0.png" alt="partner" />
                </div>
                <div class="partner_logo">
                    <img src="https://aralculturesummit.uz/uploads/images/page-sections/5/photo_136891907909c0c7e9e7914069574bdb.png" alt="partner" />
                </div>
                <div class="partner_logo">
                    <img src="https://aralculturesummit.uz/uploads/images/page-sections/5/photo_8c764ce0c1dd1503fce42ac3e52349ce.png" alt="partner" />
                </div>
                <div class="partner_logo">
                    <img src="https://aralculturesummit.uz/uploads/images/page-sections/5/photo_8156abd09e6ed302265e9f9a69e734fd.png" alt="partner" />
                </div>
            </div>
        </div>
    </div>
</section>

<section
    data-width="180"
    data-redirect="https://www.aralschool.uz/en"
    class="menu_bar aral_school redirect-section"
>
    <div class="section_header">
        <p class="first_title">ARAL SCHOOL</p>
    </div>
</section>
@endsection
