<?php 
  //require __DIR__ . '/../src/login.php';
?>

    <div class="card-body">
  Opis projektnog zadatka:

  Program u web okolinki koji služi za administraciju ljudskih potencijala. Kreirana je baza podataka 
  u kojoj se nalaze tri tablice, tablica za korisnike, osobe i kategorije poslova. Tablica za korisnike
  služi za registraciju novih korisnika te prijavu administratora i korisnika. Tablica za osobe služi za
  spremanje podataka pojedine osobe, isto tako i tablica za kategorije poslova. Aplikacija sadržava funkcionalnosti
  pregleda dodanih osoba u tabličnom obliku sa mogućnošću live pretrage, dodavanje, brisanje i uređivanje osoba.
  Prikazana je tablica sa kategorijama poslova mogućnost dodavanja novih kategorija, te uređivanje i brisanje
  postojećih kategorija.

  Opis projektnog rješenja:

  Projekt sam započeo s prijavom i registracijom. Korištenjem gotovih css frameworka izradio sam forme za prijavu 
  i registraciju. Rješenje sam našao na youtube-u, preko php-a i mysqli. Nakon uspješne izrade registracije i unosa 
  korisnik u phpMyAdmin bazu podataka izradio sam prijavu/odjavu preko sessiona i spremanje korisničkog imena u cookies.
  Nakon registracije i prijave napravio sam novu tablicu u bazi podataka za spremanje osoba. Kada sam napravio formu
  za unos napravljena google reCaptcha v3 osobe ispisao sam sve osobe u tablicu i umetnuo dva gumba za brisanje i 
  uređivanje dodanih osoba. Napisana forma i kod za uređivanje i brisanje. Dodana opcija live pretrage osoba 
  korištenjem ajaxa. Isto tako za tablicu kategorije poslova. Nakon toga napravljena stranica za administratora. 
  Dodana mogućnost spremanja i uvoz backup-a tablica iz baze podataka. Uređivanje koda za prijavu, dodan stupac u 
  bazu gdje svi korisnici imaju vrijednost 0 dok administrator ima vrijednost 1. Ako je vrijdnost 1, administrator 
  se prijavljuje i otvara mu se mogućnost ulaza u stranicu za administratora gdje može brisati korisnike, nad 
  korisnicima napravljeno straničanje. Dodan gumb za učitavanje i ispis podataka iz tablice osoba bez da se stranica 
  osvježi. 

  Opis korištenih tehnologija i alata:

  - HTML: HyperText Markup Language. Jezik za oblikovanje (formatiranje) web dokumenata.
  - URI: Uniform Resource Identifier. Sustav adresiranja koji jedinstveno određuje svaki pojedini resurs na webu 
    (naziva se često i URL).
  - HTTP: Hypertext Transfer Protocol. Komunikacijski protokol weba. 
  - XAMPP: softverski paket otvorenog koda koji se koristi kao PHP razvojno okruženje.
  - PHP: jedan programski jezik koji se orijentira po C i Perl sintaksi, namijenjen prvenstveno programiranju 
    dinamičnih web stranica.
  - JavaScript: skriptni programski jezik, koji se izvršava u web pregledniku na strani korisnika.
  - phpMyAdmin: Aplikacija otvorenog koda phpMyAdmin napisana je u PHP programskom jeziku, a namijenjena je 
    administraciji MySQL servera putem web sučelja. 
  - Bootstrap: skup alata (kreiranih u CSS-u i JavaScript-u) koji omogućava brzu i kvalitetnu, konzistentnu izradu 
    frontend-a web stranice.

  Popis uočenih problema u radu:

  JavaScript error u login.php i signup.php: Uncaught TypeError: Cannot read properties of null (reading 'addEventListener')
  Dodavanje osobe nekad zna javit error za duplicated oib iako nije isti ili osoba postoji.
  Administrator može izbrisati sebe.
  Livesearch prikazuje podatke ali su svi podaci spojeni u jedan string.
  Phpmailer ne radi, ne šalje se mail pri registraciji.
  Kod unosa backup-a ispisuje grešku na kraju:
  Fatal error: Uncaught ValueError: mysqli_query(): Argument #2 ($query) cannot be empty in 
  C:\xampp\htdocs\AdministracijaLPv2\dbhcontroll\importdbh.php:22 Stack trace: #0 
  C:\xampp\htdocs\AdministracijaLPv2\dbhcontroll\importdbh.php(22): mysqli_query(Object(mysqli), '') 
  #1 {main} thrown in C:\xampp\htdocs\AdministracijaLPv2\dbhcontroll\importdbh.php on line 22
  ali se kod svejedno izvrši i unesu se svi podaci u bazu.
    </div>
  </div>
 
  


  Popis mapa i datoteka:

  │   adminpage.php
  │   ajaxfile.php
  │   index.php
  │   loaddata.php
  │   login.php
  │   script.js
  │   signup.php
  │
  ├───.vscode
  │       launch.json
  │
  ├───bootstrap-5.3.0-alpha1
  │   │   .babelrc.js
  │   │   .browserslistrc
  │   │   .bundlewatch.config.json
  │   │   .cspell.json
  │   │   .editorconfig
  │   │   .eslintignore
  │   │   .eslintrc.json
  │   │   .gitattributes
  │   │   .gitignore
  │   │   .stylelintignore
  │   │   .stylelintrc
  │   │   CODE_OF_CONDUCT.md
  │   │   composer.json
  │   │   config.yml
  │   │   jquery-3.6.1.min.js
  │   │   LICENSE
  │   │   package-lock.json
  │   │   package.js
  │   │   package.json
  │   │   README.md
  │   │   SECURITY.md
  │   │
  │   ├───.github
  │   │   │   CODEOWNERS
  │   │   │   CONTRIBUTING.md
  │   │   │   dependabot.yml
  │   │   │   PULL_REQUEST_TEMPLATE.md
  │   │   │   release-drafter.yml
  │   │   │   SUPPORT.md
  │   │   │
  │   │   ├───codeql
  │   │   │       codeql-config.yml
  │   │   │
  │   │   ├───ISSUE_TEMPLATE
  │   │   │       bug_report.yml
  │   │   │       config.yml
  │   │   │       feature_request.yml
  │   │   │
  │   │   └───workflows
  │   │           browserstack.yml
  │   │           bundlewatch.yml
  │   │           calibreapp-image-actions.yml
  │   │           codeql.yml
  │   │           cspell.yml
  │   │           css.yml
  │   │           docs.yml
  │   │           issue-close-require.yml
  │   │           issue-labeled.yml
  │   │           js.yml
  │   │           lint.yml
  │   │           node-sass.yml
  │   │           release-notes.yml
  │   │           scorecards.yml
  │   │
  │   ├───build
  │   │       .eslintrc.json
  │   │       banner.js
  │   │       build-plugins.js
  │   │       change-version.js
  │   │       generate-sri.js
  │   │       postcss.config.js
  │   │       rollup.config.js
  │   │       vnu-jar.js
  │   │       zip-examples.js
  │   │
  │   ├───dist
  │   │   ├───css
  │   │   │       bootstrap-grid.css
  │   │   │       bootstrap-grid.css.map
  │   │   │       bootstrap-grid.min.css
  │   │   │       bootstrap-grid.min.css.map
  │   │   │       bootstrap-grid.rtl.css
  │   │   │       bootstrap-grid.rtl.css.map
  │   │   │       bootstrap-grid.rtl.min.css
  │   │   │       bootstrap-grid.rtl.min.css.map
  │   │   │       bootstrap-reboot.css
  │   │   │       bootstrap-reboot.css.map
  │   │   │       bootstrap-reboot.min.css
  │   │   │       bootstrap-reboot.min.css.map
  │   │   │       bootstrap-reboot.rtl.css
  │   │   │       bootstrap-reboot.rtl.css.map
  │   │   │       bootstrap-reboot.rtl.min.css
  │   │   │       bootstrap-reboot.rtl.min.css.map
  │   │   │       bootstrap-utilities.css
  │   │   │       bootstrap-utilities.css.map
  │   │   │       bootstrap-utilities.min.css
  │   │   │       bootstrap-utilities.min.css.map
  │   │   │       bootstrap-utilities.rtl.css
  │   │   │       bootstrap-utilities.rtl.css.map
  │   │   │       bootstrap-utilities.rtl.min.css
  │   │   │       bootstrap-utilities.rtl.min.css.map
  │   │   │       bootstrap.css
  │   │   │       bootstrap.css.map
  │   │   │       bootstrap.min.css
  │   │   │       bootstrap.min.css.map
  │   │   │       bootstrap.rtl.css
  │   │   │       bootstrap.rtl.css.map
  │   │   │       bootstrap.rtl.min.css
  │   │   │       bootstrap.rtl.min.css.map
  │   │   │
  │   │   └───js
  │   │           bootstrap.bundle.js
  │   │           bootstrap.bundle.js.map
  │   │           bootstrap.bundle.min.js
  │   │           bootstrap.bundle.min.js.map
  │   │           bootstrap.esm.js
  │   │           bootstrap.esm.js.map
  │   │           bootstrap.esm.min.js
  │   │           bootstrap.esm.min.js.map
  │   │           bootstrap.js
  │   │           bootstrap.js.map
  │   │           bootstrap.min.js
  │   │           bootstrap.min.js.map
  │   │
  │   ├───js
  │   │   │   .eslintrc.json
  │   │   │   index.esm.js
  │   │   │   index.umd.js
  │   │   │
  │   │   ├───dist
  │   │   │   │   alert.js
  │   │   │   │   alert.js.map
  │   │   │   │   base-component.js
  │   │   │   │   base-component.js.map
  │   │   │   │   button.js
  │   │   │   │   button.js.map
  │   │   │   │   carousel.js
  │   │   │   │   carousel.js.map
  │   │   │   │   collapse.js
  │   │   │   │   collapse.js.map
  │   │   │   │   dropdown.js
  │   │   │   │   dropdown.js.map
  │   │   │   │   modal.js
  │   │   │   │   modal.js.map
  │   │   │   │   offcanvas.js
  │   │   │   │   offcanvas.js.map
  │   │   │   │   popover.js
  │   │   │   │   popover.js.map
  │   │   │   │   scrollspy.js
  │   │   │   │   scrollspy.js.map
  │   │   │   │   tab.js
  │   │   │   │   tab.js.map
  │   │   │   │   toast.js
  │   │   │   │   toast.js.map
  │   │   │   │   tooltip.js
  │   │   │   │   tooltip.js.map
  │   │   │   │
  │   │   │   ├───dom
  │   │   │   │       data.js
  │   │   │   │       data.js.map
  │   │   │   │       event-handler.js
  │   │   │   │       event-handler.js.map
  │   │   │   │       manipulator.js
  │   │   │   │       manipulator.js.map
  │   │   │   │       selector-engine.js
  │   │   │   │       selector-engine.js.map
  │   │   │   │
  │   │   │   └───util
  │   │   │           backdrop.js
  │   │   │           backdrop.js.map
  │   │   │           component-functions.js
  │   │   │           component-functions.js.map
  │   │   │           config.js
  │   │   │           config.js.map
  │   │   │           focustrap.js
  │   │   │           focustrap.js.map
  │   │   │           index.js
  │   │   │           index.js.map
  │   │   │           sanitizer.js
  │   │   │           sanitizer.js.map
  │   │   │           scrollbar.js
  │   │   │           scrollbar.js.map
  │   │   │           swipe.js
  │   │   │           swipe.js.map
  │   │   │           template-factory.js
  │   │   │           template-factory.js.map
  │   │   │
  │   │   ├───src
  │   │   │   │   alert.js
  │   │   │   │   base-component.js
  │   │   │   │   button.js
  │   │   │   │   carousel.js
  │   │   │   │   collapse.js
  │   │   │   │   dropdown.js
  │   │   │   │   modal.js
  │   │   │   │   offcanvas.js
  │   │   │   │   popover.js
  │   │   │   │   scrollspy.js
  │   │   │   │   tab.js
  │   │   │   │   toast.js
  │   │   │   │   tooltip.js
  │   │   │   │
  │   │   │   ├───dom
  │   │   │   │       data.js
  │   │   │   │       event-handler.js
  │   │   │   │       manipulator.js
  │   │   │   │       selector-engine.js
  │   │   │   │
  │   │   │   └───util
  │   │   │           backdrop.js
  │   │   │           component-functions.js
  │   │   │           config.js
  │   │   │           focustrap.js
  │   │   │           index.js
  │   │   │           sanitizer.js
  │   │   │           scrollbar.js
  │   │   │           swipe.js
  │   │   │           template-factory.js
  │   │   │
  │   │   └───tests
  │   │       │   browsers.js
  │   │       │   karma.conf.js
  │   │       │   README.md
  │   │       │
  │   │       ├───helpers
  │   │       │       fixture.js
  │   │       │
  │   │       ├───integration
  │   │       │       bundle-modularity.js
  │   │       │       bundle.js
  │   │       │       index.html
  │   │       │       rollup.bundle-modularity.js
  │   │       │       rollup.bundle.js
  │   │       │
  │   │       ├───unit
  │   │       │   │   .eslintrc.json
  │   │       │   │   alert.spec.js
  │   │       │   │   base-component.spec.js
  │   │       │   │   button.spec.js
  │   │       │   │   carousel.spec.js
  │   │       │   │   collapse.spec.js
  │   │       │   │   dropdown.spec.js
  │   │       │   │   jquery.spec.js
  │   │       │   │   modal.spec.js
  │   │       │   │   offcanvas.spec.js
  │   │       │   │   popover.spec.js
  │   │       │   │   scrollspy.spec.js
  │   │       │   │   tab.spec.js
  │   │       │   │   toast.spec.js
  │   │       │   │   tooltip.spec.js
  │   │       │   │
  │   │       │   ├───dom
  │   │       │   │       data.spec.js
  │   │       │   │       event-handler.spec.js
  │   │       │   │       manipulator.spec.js
  │   │       │   │       selector-engine.spec.js
  │   │       │   │
  │   │       │   └───util
  │   │       │           backdrop.spec.js
  │   │       │           component-functions.spec.js
  │   │       │           config.spec.js
  │   │       │           focustrap.spec.js
  │   │       │           index.spec.js
  │   │       │           sanitizer.spec.js
  │   │       │           scrollbar.spec.js
  │   │       │           swipe.spec.js
  │   │       │           template-factory.spec.js
  │   │       │
  │   │       └───visual
  │   │               .eslintrc.json
  │   │               alert.html
  │   │               button.html
  │   │               carousel.html
  │   │               collapse.html
  │   │               dropdown.html
  │   │               modal.html
  │   │               popover.html
  │   │               scrollspy.html
  │   │               tab.html
  │   │               toast.html
  │   │               tooltip.html
  │   │
  │   ├───nuget
  │   │       bootstrap.nuspec
  │   │       bootstrap.png
  │   │       bootstrap.sass.nuspec
  │   │       MyGet.ps1
  │   │
  │   ├───scss
  │   │   │   bootstrap-grid.scss
  │   │   │   bootstrap-reboot.scss
  │   │   │   bootstrap-utilities.scss
  │   │   │   bootstrap.scss
  │   │   │   _accordion.scss
  │   │   │   _alert.scss
  │   │   │   _badge.scss
  │   │   │   _breadcrumb.scss
  │   │   │   _button-group.scss
  │   │   │   _buttons.scss
  │   │   │   _card.scss
  │   │   │   _carousel.scss
  │   │   │   _close.scss
  │   │   │   _containers.scss
  │   │   │   _dropdown.scss
  │   │   │   _forms.scss
  │   │   │   _functions.scss
  │   │   │   _grid.scss
  │   │   │   _helpers.scss
  │   │   │   _images.scss
  │   │   │   _list-group.scss
  │   │   │   _maps.scss
  │   │   │   _mixins.scss
  │   │   │   _modal.scss
  │   │   │   _nav.scss
  │   │   │   _navbar.scss
  │   │   │   _offcanvas.scss
  │   │   │   _pagination.scss
  │   │   │   _placeholders.scss
  │   │   │   _popover.scss
  │   │   │   _progress.scss
  │   │   │   _reboot.scss
  │   │   │   _root.scss
  │   │   │   _spinners.scss
  │   │   │   _tables.scss
  │   │   │   _toasts.scss
  │   │   │   _tooltip.scss
  │   │   │   _transitions.scss
  │   │   │   _type.scss
  │   │   │   _utilities.scss
  │   │   │   _variables-dark.scss
  │   │   │   _variables.scss
  │   │   │
  │   │   ├───forms
  │   │   │       _floating-labels.scss
  │   │   │       _form-check.scss
  │   │   │       _form-control.scss
  │   │   │       _form-range.scss
  │   │   │       _form-select.scss
  │   │   │       _form-text.scss
  │   │   │       _input-group.scss
  │   │   │       _labels.scss
  │   │   │       _validation.scss
  │   │   │
  │   │   ├───helpers
  │   │   │       _clearfix.scss
  │   │   │       _color-bg.scss
  │   │   │       _colored-links.scss
  │   │   │       _position.scss
  │   │   │       _ratio.scss
  │   │   │       _stacks.scss
  │   │   │       _stretched-link.scss
  │   │   │       _text-truncation.scss
  │   │   │       _visually-hidden.scss
  │   │   │       _vr.scss
  │   │   │
  │   │   ├───mixins
  │   │   │       _alert.scss
  │   │   │       _backdrop.scss
  │   │   │       _banner.scss
  │   │   │       _border-radius.scss
  │   │   │       _box-shadow.scss
  │   │   │       _breakpoints.scss
  │   │   │       _buttons.scss
  │   │   │       _caret.scss
  │   │   │       _clearfix.scss
  │   │   │       _color-mode.scss
  │   │   │       _color-scheme.scss
  │   │   │       _container.scss
  │   │   │       _deprecate.scss
  │   │   │       _forms.scss
  │   │   │       _gradients.scss
  │   │   │       _grid.scss
  │   │   │       _image.scss
  │   │   │       _list-group.scss
  │   │   │       _lists.scss
  │   │   │       _pagination.scss
  │   │   │       _reset-text.scss
  │   │   │       _resize.scss
  │   │   │       _table-variants.scss
  │   │   │       _text-truncate.scss
  │   │   │       _transition.scss
  │   │   │       _utilities.scss
  │   │   │       _visually-hidden.scss
  │   │   │
  │   │   ├───utilities
  │   │   │       _api.scss
  │   │   │
  │   │   └───vendor
  │   │           _rfs.scss
  │   │
  │   └───site
  │       │   .eslintrc.json
  │       │
  │       ├───assets
  │       │   ├───js
  │       │   │   │   application.js
  │       │   │   │   code-examples.js
  │       │   │   │   search.js
  │       │   │   │   snippets.js
  │       │   │   │
  │       │   │   └───vendor
  │       │   │           clipboard.min.js
  │       │   │
  │       │   └───scss
  │       │           docs.scss
  │       │           _ads.scss
  │       │           _anchor.scss
  │       │           _brand.scss
  │       │           _buttons.scss
  │       │           _callouts.scss
  │       │           _clipboard-js.scss
  │       │           _colors.scss
  │       │           _component-examples.scss
  │       │           _content.scss
  │       │           _footer.scss
  │       │           _layout.scss
  │       │           _masthead.scss
  │       │           _navbar.scss
  │       │           _placeholder-img.scss
  │       │           _search.scss
  │       │           _sidebar.scss
  │       │           _skippy.scss
  │       │           _syntax.scss
  │       │           _toc.scss
  │       │           _variables.scss
  │       │
  │       ├───content
  │       │   │   404.md
  │       │   │
  │       │   └───docs
  │       │       │   versions.md
  │       │       │   _index.html
  │       │       │
  │       │       └───5.3
  │       │           │   migration.md
  │       │           │   _index.html
  │       │           │
  │       │           ├───about
  │       │           │       brand.md
  │       │           │       license.md
  │       │           │       overview.md
  │       │           │       team.md
  │       │           │       translations.md
  │       │           │
  │       │           ├───components
  │       │           │       accordion.md
  │       │           │       alerts.md
  │       │           │       badge.md
  │       │           │       breadcrumb.md
  │       │           │       button-group.md
  │       │           │       buttons.md
  │       │           │       card.md
  │       │           │       carousel.md
  │       │           │       close-button.md
  │       │           │       collapse.md
  │       │           │       dropdowns.md
  │       │           │       list-group.md
  │       │           │       modal.md
  │       │           │       navbar.md
  │       │           │       navs-tabs.md
  │       │           │       offcanvas.md
  │       │           │       pagination.md
  │       │           │       placeholders.md
  │       │           │       popovers.md
  │       │           │       progress.md
  │       │           │       scrollspy.md
  │       │           │       spinners.md
  │       │           │       toasts.md
  │       │           │       tooltips.md
  │       │           │
  │       │           ├───content
  │       │           │       figures.md
  │       │           │       images.md
  │       │           │       reboot.md
  │       │           │       tables.md
  │       │           │       typography.md
  │       │           │
  │       │           ├───customize
  │       │           │       color-modes.md
  │       │           │       color.md
  │       │           │       components.md
  │       │           │       css-variables.md
  │       │           │       optimize.md
  │       │           │       options.md
  │       │           │       overview.md
  │       │           │       sass.md
  │       │           │
  │       │           ├───examples
  │       │           │   │   .stylelintrc
  │       │           │   │   _index.md
  │       │           │   │
  │       │           │   ├───album
  │       │           │   │       index.html
  │       │           │   │
  │       │           │   ├───album-rtl
  │       │           │   │       index.html
  │       │           │   │
  │       │           │   ├───blog
  │       │           │   │       blog.css
  │       │           │   │       blog.rtl.css
  │       │           │   │       index.html
  │       │           │   │
  │       │           │   ├───blog-rtl
  │       │           │   │       index.html
  │       │           │   │
  │       │           │   ├───carousel
  │       │           │   │       carousel.css
  │       │           │   │       carousel.rtl.css
  │       │           │   │       index.html
  │       │           │   │
  │       │           │   ├───carousel-rtl
  │       │           │   │       index.html
  │       │           │   │
  │       │           │   ├───cheatsheet
  │       │           │   │       cheatsheet.css
  │       │           │   │       cheatsheet.js
  │       │           │   │       cheatsheet.rtl.css
  │       │           │   │       index.html
  │       │           │   │
  │       │           │   ├───cheatsheet-rtl
  │       │           │   │       index.html
  │       │           │   │
  │       │           │   ├───checkout
  │       │           │   │       checkout.css
  │       │           │   │       checkout.js
  │       │           │   │       index.html
  │       │           │   │
  │       │           │   ├───checkout-rtl
  │       │           │   │       index.html
  │       │           │   │
  │       │           │   ├───cover
  │       │           │   │       cover.css
  │       │           │   │       index.html
  │       │           │   │
  │       │           │   ├───dashboard
  │       │           │   │       dashboard.css
  │       │           │   │       dashboard.js
  │       │           │   │       dashboard.rtl.css
  │       │           │   │       index.html
  │       │           │   │
  │       │           │   ├───dashboard-rtl
  │       │           │   │       dashboard.js
  │       │           │   │       index.html
  │       │           │   │
  │       │           │   ├───dropdowns
  │       │           │   │       dropdowns.css
  │       │           │   │       index.html
  │       │           │   │
  │       │           │   ├───features
  │       │           │   │       features.css
  │       │           │   │       index.html
  │       │           │   │       unsplash-photo-1.jpg
  │       │           │   │       unsplash-photo-2.jpg
  │       │           │   │       unsplash-photo-3.jpg
  │       │           │   │
  │       │           │   ├───footers
  │       │           │   │       index.html
  │       │           │   │
  │       │           │   ├───grid
  │       │           │   │       grid.css
  │       │           │   │       index.html
  │       │           │   │
  │       │           │   ├───headers
  │       │           │   │       headers.css
  │       │           │   │       index.html
  │       │           │   │
  │       │           │   ├───heroes
  │       │           │   │       bootstrap-docs.png
  │       │           │   │       bootstrap-themes.png
  │       │           │   │       heroes.css
  │       │           │   │       index.html
  │       │           │   │
  │       │           │   ├───jumbotron
  │       │           │   │       index.html
  │       │           │   │
  │       │           │   ├───list-groups
  │       │           │   │       index.html
  │       │           │   │       list-groups.css
  │       │           │   │
  │       │           │   ├───masonry
  │       │           │   │       index.html
  │       │           │   │
  │       │           │   ├───modals
  │       │           │   │       index.html
  │       │           │   │       modals.css
  │       │           │   │
  │       │           │   ├───navbar-bottom
  │       │           │   │       index.html
  │       │           │   │
  │       │           │   ├───navbar-fixed
  │       │           │   │       index.html
  │       │           │   │       navbar-fixed.css
  │       │           │   │
  │       │           │   ├───navbar-static
  │       │           │   │       index.html
  │       │           │   │       navbar-static.css
  │       │           │   │
  │       │           │   ├───navbars
  │       │           │   │       index.html
  │       │           │   │       navbars.css
  │       │           │   │
  │       │           │   ├───navbars-offcanvas
  │       │           │   │       index.html
  │       │           │   │       navbars-offcanvas.css
  │       │           │   │
  │       │           │   ├───offcanvas-navbar
  │       │           │   │       index.html
  │       │           │   │       offcanvas-navbar.css
  │       │           │   │       offcanvas-navbar.js
  │       │           │   │
  │       │           │   ├───pricing
  │       │           │   │       index.html
  │       │           │   │       pricing.css
  │       │           │   │
  │       │           │   ├───product
  │       │           │   │       index.html
  │       │           │   │       product.css
  │       │           │   │
  │       │           │   ├───sidebars
  │       │           │   │       index.html
  │       │           │   │       sidebars.css
  │       │           │   │       sidebars.js
  │       │           │   │
  │       │           │   ├───sign-in
  │       │           │   │       index.html
  │       │           │   │       sign-in.css
  │       │           │   │
  │       │           │   ├───starter-template
  │       │           │   │       index.html
  │       │           │   │       starter-template.css
  │       │           │   │
  │       │           │   ├───sticky-footer
  │       │           │   │       index.html
  │       │           │   │       sticky-footer.css
  │       │           │   │
  │       │           │   └───sticky-footer-navbar
  │       │           │           index.html
  │       │           │           sticky-footer-navbar.css
  │       │           │
  │       │           ├───extend
  │       │           │       approach.md
  │       │           │       icons.md
  │       │           │
  │       │           ├───forms
  │       │           │       checks-radios.md
  │       │           │       floating-labels.md
  │       │           │       form-control.md
  │       │           │       input-group.md
  │       │           │       layout.md
  │       │           │       overview.md
  │       │           │       range.md
  │       │           │       select.md
  │       │           │       validation.md
  │       │           │
  │       │           ├───getting-started
  │       │           │       accessibility.md
  │       │           │       best-practices.md
  │       │           │       browsers-devices.md
  │       │           │       contents.md
  │       │           │       contribute.md
  │       │           │       download.md
  │       │           │       introduction.md
  │       │           │       javascript.md
  │       │           │       parcel.md
  │       │           │       rfs.md
  │       │           │       rtl.md
  │       │           │       vite.md
  │       │           │       webpack.md
  │       │           │
  │       │           ├───helpers
  │       │           │       clearfix.md
  │       │           │       color-background.md
  │       │           │       colored-links.md
  │       │           │       position.md
  │       │           │       ratio.md
  │       │           │       stacks.md
  │       │           │       stretched-link.md
  │       │           │       text-truncation.md
  │       │           │       vertical-rule.md
  │       │           │       visually-hidden.md
  │       │           │
  │       │           ├───layout
  │       │           │       breakpoints.md
  │       │           │       columns.md
  │       │           │       containers.md
  │       │           │       css-grid.md
  │       │           │       grid.md
  │       │           │       gutters.md
  │       │           │       utilities.md
  │       │           │       z-index.md
  │       │           │
  │       │           └───utilities
  │       │                   api.md
  │       │                   background.md
  │       │                   borders.md
  │       │                   colors.md
  │       │                   display.md
  │       │                   flex.md
  │       │                   float.md
  │       │                   interactions.md
  │       │                   object-fit.md
  │       │                   opacity.md
  │       │                   overflow.md
  │       │                   position.md
  │       │                   shadows.md
  │       │                   sizing.md
  │       │                   spacing.md
  │       │                   text.md
  │       │                   vertical-align.md
  │       │                   visibility.md
  │       │                   z-index.md
  │       │
  │       ├───data
  │       │       breakpoints.yml
  │       │       colors.yml
  │       │       core-team.yml
  │       │       docs-versions.yml
  │       │       examples.yml
  │       │       grays.yml
  │       │       icons.yml
  │       │       plugins.yml
  │       │       sidebar.yml
  │       │       theme-colors.yml
  │       │       translations.yml
  │       │
  │       ├───layouts
  │       │   │   alias.html
  │       │   │   robots.txt
  │       │   │   sitemap.xml
  │       │   │
  │       │   ├───partials
  │       │   │   │   ads.html
  │       │   │   │   analytics.html
  │       │   │   │   docs-navbar.html
  │       │   │   │   docs-sidebar.html
  │       │   │   │   docs-versions.html
  │       │   │   │   favicons.html
  │       │   │   │   footer.html
  │       │   │   │   guide-footer.md
  │       │   │   │   header.html
  │       │   │   │   icons.html
  │       │   │   │   js-data-attributes.md
  │       │   │   │   redirect.html
  │       │   │   │   scripts.html
  │       │   │   │   skippy.html
  │       │   │   │   social.html
  │       │   │   │   stylesheet.html
  │       │   │   │   table-content.html
  │       │   │   │
  │       │   │   ├───callouts
  │       │   │   │       danger-async-methods.md
  │       │   │   │       info-mediaqueries-breakpoints.md
  │       │   │   │       info-npm-starter.md
  │       │   │   │       info-prefersreducedmotion.md
  │       │   │   │       info-sanitizer.md
  │       │   │   │       warning-color-assistive-technologies.md
  │       │   │   │       warning-data-bs-title-vs-title.md
  │       │   │   │       warning-input-support.md
  │       │   │   │
  │       │   │   ├───home
  │       │   │   │       components-utilities.html
  │       │   │   │       css-variables.html
  │       │   │   │       customize.html
  │       │   │   │       get-started.html
  │       │   │   │       icons.html
  │       │   │   │       masthead.html
  │       │   │   │       plugins.html
  │       │   │   │       themes.html
  │       │   │   │
  │       │   │   └───icons
  │       │   │           bootstrap-logo-solid.svg
  │       │   │           bootstrap-white-fill.svg
  │       │   │           bootstrap.svg
  │       │   │           circle-square.svg
  │       │   │           cloud-fill.svg
  │       │   │           code.svg
  │       │   │           collapse.svg
  │       │   │           droplet-fill.svg
  │       │   │           expand.svg
  │       │   │           github.svg
  │       │   │           hamburger.svg
  │       │   │           homepage-hero.svg
  │       │   │           list.svg
  │       │   │           menu.svg
  │       │   │           opencollective.svg
  │       │   │           twitter.svg
  │       │   │
  │       │   ├───shortcodes
  │       │   │       added-in.html
  │       │   │       bs-table.html
  │       │   │       callout-deprecated-dark-variants.html
  │       │   │       callout.html
  │       │   │       deprecated-in.html
  │       │   │       docsref.html
  │       │   │       example.html
  │       │   │       js-dismiss.html
  │       │   │       markdown.html
  │       │   │       param.html
  │       │   │       partial.html
  │       │   │       placeholder.html
  │       │   │       scss-docs.html
  │       │   │       table.html
  │       │   │       year.html
  │       │   │
  │       │   └───_default
  │       │       │   404.html
  │       │       │   baseof.html
  │       │       │   docs.html
  │       │       │   examples.html
  │       │       │   home.html
  │       │       │   redirect.html
  │       │       │   single.html
  │       │       │
  │       │       └───_markup
  │       │               render-heading.html
  │       │
  │       └───static
  │           │   CNAME
  │           │   sw.js
  │           │
  │           └───docs
  │               └───5.3
  │                   └───assets
  │                       ├───brand
  │                       │       bootstrap-logo-black.svg
  │                       │       bootstrap-logo-shadow.png
  │                       │       bootstrap-logo-white.svg
  │                       │       bootstrap-logo.svg
  │                       │       bootstrap-social-logo.png
  │                       │       bootstrap-social.png
  │                       │
  │                       ├───img
  │                       │   │   bootstrap-icons.png
  │                       │   │   bootstrap-icons@2x.png
  │                       │   │   bootstrap-themes-collage.png
  │                       │   │   bootstrap-themes-collage@2x.png
  │                       │   │   bootstrap-themes.png
  │                       │   │   bootstrap-themes@2x.png
  │                       │   │   parcel.png
  │                       │   │   vite.svg
  │                       │   │   webpack.svg
  │                       │   │
  │                       │   ├───examples
  │                       │   │       album-rtl.png
  │                       │   │       album-rtl@2x.png
  │                       │   │       album.png
  │                       │   │       album@2x.png
  │                       │   │       blog-rtl.png
  │                       │   │       blog-rtl@2x.png
  │                       │   │       blog.png
  │                       │   │       blog@2x.png
  │                       │   │       carousel-rtl.png
  │                       │   │       carousel-rtl@2x.png
  │                       │   │       carousel.png
  │                       │   │       carousel@2x.png
  │                       │   │       cheatsheet-rtl.png
  │                       │   │       cheatsheet-rtl@2x.png
  │                       │   │       cheatsheet.png
  │                       │   │       cheatsheet@2x.png
  │                       │   │       checkout-rtl.png
  │                       │   │       checkout-rtl@2x.png
  │                       │   │       checkout.png
  │                       │   │       checkout@2x.png
  │                       │   │       cover.png
  │                       │   │       cover@2x.png
  │                       │   │       dashboard-rtl.png
  │                       │   │       dashboard-rtl@2x.png
  │                       │   │       dashboard.png
  │                       │   │       dashboard@2x.png
  │                       │   │       dropdowns.png
  │                       │   │       dropdowns@2x.png
  │                       │   │       features.png
  │                       │   │       features@2x.png
  │                       │   │       footers.png
  │                       │   │       footers@2x.png
  │                       │   │       grid.png
  │                       │   │       grid@2x.png
  │                       │   │       headers.png
  │                       │   │       headers@2x.png
  │                       │   │       heroes.png
  │                       │   │       heroes@2x.png
  │                       │   │       jumbotron.png
  │                       │   │       jumbotron@2x.png
  │                       │   │       list-groups.png
  │                       │   │       list-groups@2x.png
  │                       │   │       masonry.png
  │                       │   │       masonry@2x.png
  │                       │   │       modals.png
  │                       │   │       modals@2x.png
  │                       │   │       navbar-bottom.png
  │                       │   │       navbar-bottom@2x.png
  │                       │   │       navbar-fixed.png
  │                       │   │       navbar-fixed@2x.png
  │                       │   │       navbar-static.png
  │                       │   │       navbar-static@2x.png
  │                       │   │       navbars-offcanvas.png
  │                       │   │       navbars-offcanvas@2x.png
  │                       │   │       navbars.png
  │                       │   │       navbars@2x.png
  │                       │   │       offcanvas-navbar.png
  │                       │   │       offcanvas-navbar@2x.png
  │                       │   │       pricing.png
  │                       │   │       pricing@2x.png
  │                       │   │       product.png
  │                       │   │       product@2x.png
  │                       │   │       sidebars.png
  │                       │   │       sidebars@2x.png
  │                       │   │       sign-in.png
  │                       │   │       sign-in@2x.png
  │                       │   │       starter-template.png
  │                       │   │       starter-template@2x.png
  │                       │   │       sticky-footer-navbar.png
  │                       │   │       sticky-footer-navbar@2x.png
  │                       │   │       sticky-footer.png
  │                       │   │       sticky-footer@2x.png
  │                       │   │
  │                       │   ├───favicons
  │                       │   │       android-chrome-192x192.png
  │                       │   │       android-chrome-512x512.png
  │                       │   │       apple-touch-icon.png
  │                       │   │       favicon-16x16.png
  │                       │   │       favicon-32x32.png
  │                       │   │       favicon.ico
  │                       │   │       manifest.json
  │                       │   │       safari-pinned-tab.svg
  │                       │   │
  │                       │   └───guides
  │                       │           bootstrap-parcel.png
  │                       │           bootstrap-parcel@2x.png
  │                       │           bootstrap-vite.png
  │                       │           bootstrap-vite@2x.png
  │                       │           bootstrap-webpack.png
  │                       │           bootstrap-webpack@2x.png
  │                       │           parcel-dev-server-bootstrap.png
  │                       │           parcel-dev-server.png
  │                       │           vite-dev-server-bootstrap.png
  │                       │           vite-dev-server.png
  │                       │           webpack-dev-server-bootstrap.png
  │                       │           webpack-dev-server.png
  │                       │
  │                       └───js
  │                               color-modes.js
  │                               validate-forms.js
  │
  ├───css
  │       bootstrap.css
  │       bootstrap.min.css
  │       sign-in.css
  │
  ├───dbhcontroll
  │       backup.sql
  │       exportdbh.php
  │       importdbh.php
  │
  ├───dokumentacija
  │       autor.html
  │       dokumentacija.html
  │
  ├───includes
  │       dbh.inc.php
  │       delete.inc.php
  │       functions.inc.php
  │       header.inc.php
  │       insertkategorije.inc.php
  │       insertosobe.inc.php
  │       login.inc.php
  │       logout.inc.php
  │       signup.inc.php
  │       update.inc.php
  │
  ├───ispis
  │       ispiskategorije.php
  │       ispisosoba.php
  │       ispisusera.php
  │
  ├───js
  │       bootstrap.bundle.js
  │       bootstrap.bundle.js.map
  │       bootstrap.bundle.min.js
  │       bootstrap.bundle.min.js.map
  │       bootstrap.esm.js
  │       bootstrap.esm.js.map
  │       bootstrap.esm.min.js
  │       bootstrap.esm.min.js.map
  │       bootstrap.js
  │       bootstrap.js.map
  │       bootstrap.min.js
  │       bootstrap.min.js.map
  │
  ├───navbar
  └───phpmailer
      └───phpmailer
          │   COMMITMENT
          │   composer.json
          │   get_oauth_token.php
          │   LICENSE
          │   README.md
          │   SECURITY.md
          │   VERSION
          │
          ├───language
          │       phpmailer.lang-af.php
          │       phpmailer.lang-ar.php
          │       phpmailer.lang-az.php
          │       phpmailer.lang-ba.php
          │       phpmailer.lang-be.php
          │       phpmailer.lang-bg.php
          │       phpmailer.lang-ca.php
          │       phpmailer.lang-cs.php
          │       phpmailer.lang-da.php
          │       phpmailer.lang-de.php
          │       phpmailer.lang-el.php
          │       phpmailer.lang-eo.php
          │       phpmailer.lang-es.php
          │       phpmailer.lang-et.php
          │       phpmailer.lang-fa.php
          │       phpmailer.lang-fi.php
          │       phpmailer.lang-fo.php
          │       phpmailer.lang-fr.php
          │       phpmailer.lang-gl.php
          │       phpmailer.lang-he.php
          │       phpmailer.lang-hi.php
          │       phpmailer.lang-hr.php
          │       phpmailer.lang-hu.php
          │       phpmailer.lang-hy.php
          │       phpmailer.lang-id.php
          │       phpmailer.lang-it.php
          │       phpmailer.lang-ja.php
          │       phpmailer.lang-ka.php
          │       phpmailer.lang-ko.php
          │       phpmailer.lang-lt.php
          │       phpmailer.lang-lv.php
          │       phpmailer.lang-mg.php
          │       phpmailer.lang-mn.php
          │       phpmailer.lang-ms.php
          │       phpmailer.lang-nb.php
          │       phpmailer.lang-nl.php
          │       phpmailer.lang-pl.php
          │       phpmailer.lang-pt.php
          │       phpmailer.lang-pt_br.php
          │       phpmailer.lang-ro.php
          │       phpmailer.lang-ru.php
          │       phpmailer.lang-sk.php
          │       phpmailer.lang-sl.php
          │       phpmailer.lang-sr.php
          │       phpmailer.lang-sr_latn.php
          │       phpmailer.lang-sv.php
          │       phpmailer.lang-tl.php
          │       phpmailer.lang-tr.php
          │       phpmailer.lang-uk.php
          │       phpmailer.lang-vi.php
          │       phpmailer.lang-zh.php
          │       phpmailer.lang-zh_cn.php
          │
          └───src
                  Exception.php
                  OAuth.php
                  OAuthTokenProvider.php
                  PHPMailer.php
                  POP3.php
                  SMTP.php
                
</body>
</html>