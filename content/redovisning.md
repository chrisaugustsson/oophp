---
title: "redovisning"
---

<section class="hero is-medium is-primary is-success">
  <div class="hero-body">
    <div class="container">
      <h1 class="has-text-centered is-size-1">Redovisning</h1>
    </div>
  </div>
</section>

<div class="section columns is-centered">
  <nav class="pagination column is-narrow" role="navigation" aria-label="pagination">
  <div class="content">
  <h4>Bläddra bland kursmoment</h4>
  </div>
  <ul class="pagination-list is-centered">
    <li>
      <a class="pagination-link is-current" aria-label="Page 1" aria-current="page">1</a>
    </li>
    <li>
      <a class="pagination-link" aria-label="Goto page 2">2</a>
    </li>
    <li>
      <a class="pagination-link" aria-label="Goto page 3">3</a>
    </li>
    <li>
      <a class="pagination-link" aria-label="Goto page 4">4</a>
    </li>
    <li>
      <a class="pagination-link" aria-label="Goto page 5">5</a>
    </li>
    <li>
      <a class="pagination-link" aria-label="Goto page 6">6</a>
    </li>
    <li>
      <a class="pagination-link" aria-label="Goto page 7">7</a>
    </li>
    <li>
      <a class="pagination-link" aria-label="Goto page 8">8</a>
    </li>
  </ul>
</nav>

</div>

<DIV class="container column is-7 has-background-white-bis">
<DIV class="content">
<DIV class="redovisning">
Kursmoment 1
===============
Kunskap är en färskvara. Det blir extra tydligt när man hoppar in i ett programmeringsspråk som man inte har använt på länge. Men att man har de fundamentala bitarna i ryggen från andra språk gör det väldigt mycket lättare att komma igång. Till en början var det något knackigt.

Den objektorienterade biten känns igen mycket från oopython, vilket har hjälpt mycket. Under sommaren har jag roat mig med en del React vilket jobbar på ungefär samma sätt. Som alltid när det dyker upp saker man inte förstår får man försöka vrida och vända på koden tills man är på banan igen. Initialt hade jag lite svårt att hänga med på hur props i en klass som defineras utanför konstruktorn sklijer sig mot props som deklareras i konstruktorn. Det ser ut att fungera på precis samma sätt, men skiljer sig på en rad olika punkter. Tex om en sub-klass inte kallar på förälder-konstruktorn, deklareras aldrig propsen.

Guiden har vart väldigt bra hjälp för att komma igång. Jag uppskattade det väldigt mycket i databas-kursen, och tycker fortfarande att det är ett mycket bra koncept. Att blanda guide med uppgifter är ett optimalt sätt att komma igång och lära sig. Det gav också en bra grund till att hoppa in i "Gissa numret" uppgiften. Som alltid går det lite segt i början för mig, men när man väl börjar få grepp om hur man skall gå tillväga flyter det på. Jag började med GET varianten, och efter det var det mycket enkelt att gå över till POST. Det var inte mycket kod som jag behövde ändra för att lösa den uppgiften. För att lösa SESSION fick man ändra något mer, men fortfarande väldit smidigt att få till när man har grunden klar. Hur SESSION fungerar är dock inte helt självklart. Efter att ha laborerat en del fram och tillbaka tror jag att jag lyckats få bättre förståelse. Det får bli mitt TIL för denna veckan.

Det har varit spännande att komma tillbaka till Anax-flat med lite mer erfarenhet i bakgrunden. Det var ett tag sen man arbetade med det, men mycket kommer man ihåg! Jag har valt att implementera ett CSS-ramverk som heter Bulma. Ramverket bygger mycket på att man har en viss struktur i sin HTML kod. Det har gjort att jag har fått göra om mycket av den koden som fanns från början, men man får mycket gratis med Bulma. Att sätta upp ett grid är hur enkelt som helst samtidigt som det blir responsivt.
</div>
<DIV class="redovisning hide">
Kursmoment 2
===============
Att föra över gissa-spelet till ramverket va en bra övning i att bekanta sig mer i ramverket. Det var inga större svårigheter. Jag hade två olika vyer, en för GET och POST, samt en för SESSION. När jag väl förde över spelen insåg jag att det inte var någon större skillnad mellan de båda vyerna och kunde slå ihop koden så att endast en vy används för samtliga versioner. Utan video-serien hade jag nog inte klarat det fullt så enkelt som det nu var. Den var mycket hjälpsam!

Den automatiskt genererande dokumentationen var mycket smidig. Jag skummade igenom den som hade skapats något, och måste nog erkänna att jag inte riktigt hänger med hur den är uppbyggd. Om man jämför med ett UML-diagram (vilket är lite som att jämföra äpplen och päron), så är det mycket lättare att få en överskådlig bild över applikationen med ett UML-diagram. Däremot får du inte en detaljerad beskrivning av de olika apierna i klasserna på samma sätt som man får av dokumentationen. Som sagt, inte fullt jämförbart och fyller olika funktioner.

Jag är inte helt bekant med Anax ännu, så det blir något besvärligare att programmera i ramverket, kontra utanför. Dock tvingar ofta ett ramverk att man följer ett visst mönster i sin kod, vilket ofta är bra så länge ramverket följer ett bra mönster. Det är mycket lättare att komma igång och programmera utanför ramverket, men det är också mycket lättare att skriva "dålig" kod.


</div>
<DIV class="redovisning hide">
Kursmoment 3
===============
Detta kursmoment slutade mycket svårare än jag först trodde när jag läste uppgifterna. Till en början tänkte jag "hur svårt kan det vara?" när jag läste beskrvningen
för tärningsspelet. Väl inne i det, var det lite mer invecklat än jag först tänkt mig. Jag började med att försöka koda utifrån principen "test driven kod", där man börjar
med att skriva själva testproceduren, och sen skapar klasser utifrån det. Det blev för mycket att hålla reda på i huvudet, och jag kom inte någonstans, så jag slopade
det, och gick över till "nybörjar stilen". Koda lite, kolla i webläsaren, koda lite till... Det var inte helt enkelt att reda ut hur man skulle fördela funktionaliteten mellan
klasserna, och koden växer väldigt fort! I slutändan lyckades jag åtminstone få 100% kodtäckning i testfallen, och inte allt för mycket kod i routern, så jag känner mig ändå
nöjd. Detta är inte första gången jag skriver kod som testar kod. Vi gjorde det i oopython kursen. Men detta är första gången jag åtminstone försöker mig på att koda
testen först! Nu, lyckades jag inte särskilt bra, men ett steg i taget!

Som sagt fick jag 100% kodtäckning i mina test, men jag ifrågsätter något vad det egenltligen betyder. Jag vet defakto att all kod inte är testad, men den är åtminstone körd.
Jag hade på något vis lyckats förstöra min kod när jag höll på att skriva testerna. Testen tog inte upp detta, men mitt spel funkade inte som det skulle. Detta är verkligen
något jag skall ta med mig i ryggsäcken och ha i åtanke nästa gång jag ger mig på att skriva test och testbar kod. Att skriva testbar kod är inte helt enkelt, det var några fall där jag fick lägga till setters och getters i mina klasser då det fanns kod jag inte kunde komma åt. Något som antaligen hade gått att undvika om man hade kodat test driven kod
direkt från start. Dessutom blev några av testen något väl invecklade för att man skulle kunna komma åt allt.

I detta fallet har jag skrivit test som är white box. Där jag kan gå in och rota i källkoden. Jag kan inte riktigt föreställa mig hur jag skulle kunna lyckas med att göra
black box testing. Kankse är det fördelen med just black box testing, att det ställer högre krav på de klasser man skapar för att man enkelt skall kunna testa utan att behöva
gå in och rota i källkoden för att sedan skapa invecklade testprocedurer där man skapar flera ålika klasser och kör flera olika metoder i samma test. För man blir bortskämd av
att man har möjligheten att gå in och rota i källkoden.

Min TIL för detta kursmomenten blir att skriva test driven kod inte är fullt så enkelt som jag först trodde. Eller inte alls så enkelt...


</div>
<DIV class="redovisning hide">
Kursmoment 4
===============
Att använda sig av traits kan jag verkligen se ett användningsområde för. Väldigt smidigt om man har flera olika egenskaper som man vill dela upp, men samtidigt implementera i en och samma klass. Interface däremot, förstår jag inte riktigt när man skulle använda det. Åtminstone inte i denna typen av applikationer som vi jobbat i nu. I större applikationer kan jag förstå, där man säkerställer att klasserna har rätt interface implementerat. Det blir tydliga felmeddelanden om det är något man missat.

Det var inga större svårigheter att implementera ramverkets funktioner och koppla bort de globala värdena, som $_SESSION och $_POST. Jag försökte göra en redirect, vilket inte fungerade alls till en början, men saknade visst att köra composer update. Efter det gick de galant!

Jag var ganska ambitiös i förra kursmomentet och lyckades få 100% kodtäckning. Därför var det inte mycket jobb att bygga ut testet för den nya klassen och traitet som är implementerat. Jag hade även förberett AI-spelaren med super-simpel logik, så jag utökade logiken något. Förut tog den enbart hänsyn till hur många framgångsrika rolls som var gjorda. Alltså hur många rolls i rad som inte hade någon etta. Detta gjorde jag om till att den istället tar hänsyn till hur många rolls i rad som inte är framgångsrika, och vilka poängställning AI-spelaren har. Ifall den lite poäng skall den rulla oavsett, har den fler ska den vänta på det har varit några rullar med 1:or i.

Efter att jag läst igenom "Gamblers fallacy" fick jag en mindre uppenbarelse. Jag har alltid gått i tron att sannolikheten för att en 1:a inte skall komma ökar med antalet gånger den kommer, men faktum är att sannorlikheten inte ändras med historiken. Detta får bli mitt TIL för denna veckan.


</div>
<DIV class="redovisning hide">
Kursmoment 5
===============
Att föra över filmdatabasen och dess CRUD till ramverket var inga som helst problem. Jag gjorde något annorlunda mot hur exempelkoden var uppbyggd. Det mesta kretsar kring första movie sidan. Där finns sökfält för både titel och årtal på samma sida, ikonerna för att ta bort eller editera rader i databsen finns rätt i tabbellen. Först när du trycker på någon utan av knapparna kommer du till en annan sida där du se editerar eller får bekräfta borttagningen. För mig kändes det som ett bra flöde för användaren.

Det blev något mycket kod i routern. Något som man hade kunnat flytta ut till en egen klass, som hanterar databasfrågor. Hade jag haft mer tid över att jag gjort det så.

Jag gjorde inget utöver det som var kraven för uppgiften. Det blev en enkel CRUD sida med användarvänligt gränssnitt.

Det var en mycket bra guide i uppgiften med en del bra poänger. Men vissa saker hade jag nog gjort annorlunda. Visst är det bra att dela upp koden, men i vissa fall kan jag tycka att det är bättre att samla den på ett ställe. Om man drar det för långt med att splitta upp koden i små delar, blir det väldigt fragmenterat och svårt att förstå koden då du måste gå in på många olika ställen för att förstå helheten. I exempel koden skulle det tex kunna va esc() funktionen. Det blir inte många fler tecken att skriva htmlentities, men får någon som inte sett koden förut, blir det mycket mer jobb att förstå vad som händer just där.
</div>
<DIV class="redovisning hide">
Kursmoment 6
===============
Det är inte alltid enkelt att tänka objektorienterat. Upplever ofta att jag har svårt att hitta bra sätt att strukturera upp koden i klasser. Denna gången var inget undantag. Jag gjorde ändå ett försök att dela upp koden så mycket som jag kunde, men någonstans kan jag känna att det blir något krystat att skapa en klass för att lyfta ut någon enstaka funktion. Då skapar jag hellre en återanvändbar funktion för det ändamålet. Till uppgiften websiodr med innehåll i databasen valde jag att skapa en controller klass. I routen finns ingen annat än koden som monterar controller klassen. Jag har även delat upp en del av koden i klasserna Blog och Page. Dessa klasser hanterar Post och Pages som skall hämtas från databasen och filtreras. SQL frågorna i form av heredoc ansåg jag "smutsa" ner controllerklassen onödigt mycket och valde därför för att flytta ut detta till egna klasser. Jag försökte hitta andra möjligheter att dela koden ytterliggare, men många av de andra routsen hanterar både post och page på ett sätt som gör de svårt att dela upp koden. Det fick räcka så för denna gången.

Formateringen av texten var inga som helst problem. Klassen struktur var i princip färdig från start, och det samma gäller för samltiga filter typer. Fattades bara att lyfta in respektive filter typ till dess funktion i klassen och voiala! Magi. Filterklassen hanterar de olika filterna som en array, men skulle man skicka en kommaseparerad sträng, tas denna om hand ändå och konverteras i parse().

När jag har skrivit mycket kod, och allt fungerar som det är tänkt, brukar jag zooma ut i texteditorn och bara scrolla upp och ner för att se hur koden ser ut. Enlig mig skall koden vara tilltalande bara genom att titta på strukturen, utan att läsa vad det står. Koden som jag skrivit i controllerklassen går egentligen inte igenom min ockulära besiktning, men jag vet helt enkelt inte vad mer jag ska göra för att snygga till den. Vissa routes har lite väl mycket kod, för mycket if-satser osv, men samtidigt måste man sikta på att bli klar och överoptimera sin kod.
</div>
<DIV class="redovisning hide">
Kursmoment 7
===============
Text hamnar här


</div>
<DIV class="redovisning hide">
Kursmoment 8
===============
Text hamnar här


</div>
</div>
</div>
<SECTION class="section"></div>