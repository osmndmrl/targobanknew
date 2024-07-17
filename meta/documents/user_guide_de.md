<div class="alert alert-warning" role="alert">
   <strong><i>Hinweis:</strong></i> Das TARGOBANK-Plugin ist für die Nutzung mit dem Webshop Ceres entwickelt und funktioniert nur mit dessen Logikstruktur oder anderen Template-Plugins. 
</div>

# TARGOBANK – Bargeldloses Bezahlen in plentymarkets Online-Shops

Mit dem plentymarkets TARGOBANK Plugin binden Sie **TARGOBANK**, **TARGOBANK PLUS** und **Ratenzahlung Powered by TARGOBANK** in Ihren Webshop ein.

## TARGOBANK-Konto eröffnen

Bevor Sie die Zahlungsarten in plentymarkets einrichten können, ist die [Eröffnung eines Geschäftskontos bei TARGOBANK](https://www.targobank.com/de/webapps/mpp/merchant) erforderlich. Sie erhalten dann Informationen sowie Zugangsdaten, die Sie für die Einrichtung in plentymarkets benötigen.

## Zugangsdaten von TARGOBANK erhalten

Um das TARGOBANK-Plugin zu nutzen, müssen Sie für Ihren Webshop im [TARGOBANK Developer Interface](https://developer.targobank.com) eine App einrichten.
In der App finden Sie sowohl Live- als auch Sandbox-Zugangsdaten, die Sie im plentymarkets Backend <a href="#30."><strong>eingeben</strong></a>. Die Client ID bei TARGOBANK entspricht der Mandanten-ID im Plugin, das Secret entspricht dem Mandanten-Geheimwort.

Über das Dashboard gelangt man zur Übersicht der Schnittstellen: **My Apps & Credentials**. Wenn bereits eine App vom Typ REST – also der Webshop – eingerichtet wurde, wird diese dort angezeigt. Über **Create App** richten Sie ein neues Ziel ein.

![Ansicht des TARGOBANK Dashboards](https://github.com/plentymarkets/plugin-payment-targobank/blob/master/meta/images/sandbox_tutorial_1.png?raw=true)

Wählen Sie diese App (hier **TARGOBANKPlugin**). Eine neue Ansicht mit den Schnittstellendaten wird geöffnet. Achten Sie darauf, dass Sie für den Live-Betrieb die Daten des Live-Modus <a href="#30."><strong>eingeben</strong></a>. Mit dem Umschalter oben rechts wechseln Sie zwischen Live- und Sandbox-Modus. Alternativ können Sie mit den Sandbox-Daten einen normalen Checkout für einen Test durchlaufen.

![Ansicht des TARGOBANK Dashboards](https://github.com/plentymarkets/plugin-payment-targobank/blob/master/meta/images/sandbox_tutorial_2.png?raw=true)

## TARGOBANK in plentymarkets einrichten

Bevor Sie die Funktionen des TARGOBANK-Plugins nutzen können, müssen Sie zuerst Ihr TARGOBANK-Konto mit Ihrem plentymarkets System verbinden.

##### TARGOBANK-Konto hinzufügen:
  
1. Öffnen Sie das Menü **Einstellungen » Aufträge » TARGOBANK » Kontoeinstellungen**.
2. Klicken Sie auf **TARGOBANK-Konto hinzufügen**.
3. Geben Sie eine E-Mail-Adresse ein.<br /> 
	→ Diese E-Mail-Adresse ist gleichzeitig der Name des Kontos.
4. Geben Sie die Mandanten-ID ein.
5. Geben Sie das Mandanten-Geheimwort ein.
6. Klicken Sie auf **Hinzufügen**.<br /> 
	→ Das TARGOBANK-Konto wird hinzugefügt und in der Übersicht angezeigt.

Nach dem Hinzufügen nehmen Sie weitere Einstellungen für das Konto vor.

##### TARGOBANK-Konto verwalten:
 
1. Öffnen Sie das Menü **Einstellungen » Aufträge » TARGOBANK » Kontoeinstellungen**.
2. Klicken Sie auf das TARGOBANK-Konto, das Sie konfigurieren möchten.<br /> 
	→ Das TARGOBANK-Konto wird geöffnet.
3. Nehmen Sie die Einstellungen vor. Beachten Sie dazu die Erläuterungen in Tabelle 1.
4. **Speichern** Sie die Einstellungen.

<table>
<caption>Tab. 1: TARGOBANK-Kontoeinstellungen vornehmen</caption>
	<thead>
		<th>
			Einstellung
		</th>
		<th>
			Erläuterung
		</th>
	</thead>
	<tbody>
		<tr>
			<td>
				<b>Mandanten-Einstellungen</b>
			</td>
			<td><a id="30." name="30."></a><b>Konto:</b> Die eingegebene E-Mail-Adresse, die gleichzeitig als Name des Kontos fungiert.<br /> <b>Mandanten-ID:</b> Ihre TARGOBANK-ID.<br /><b>Mandanten-Geheimwort:</b> Ihr TARGOBANK-Geheimwort.<br /><strong><i>Hinweis:</strong></i> Diese Angaben können nicht mehr geändert werden.
			</td>
		</tr>
		<tr>
			<td>
				<b>Umgebung</b>
			</td>
			<td>			
<b>Testumgebung</b> oder <b>Live-Umgebung</b> wählen.<br />
<strong><i>Wichtig:</i></strong> Da die eingegebenen Daten nicht mehr änderbar sind, werden zwei Konten für Testumgebung und Live-Umgebung benötigt.<br />
<b>Testumgebung</b>: Testnutzer und Testdaten in der <strong><a href="https://developer.targobank.com/developer/accounts/" target="_blank">TARGOBANK Sandbox</a></strong> hinterlegen. Die Testumgebung ist für Kunden nicht zugänglich.<br />
<b>Live-Umgebung</b>: Auf diese Umgebung wechseln, um das eingestellte TARGOBANK-Konto für die Zahlung verfügbar zu machen.
			</td>
		</tr>
		<tr>
			<td>
				<b>Logo-URL</b>
			</td>
			<td>
			Eine https-URL, die zum Logo-Bild führt. Gültige Dateiformate sind .gif, .jpg oder .png. Die Maximalgröße beträgt 190 Pixel in der Breite und 60 Pixel in der Höhe. TARGOBANK schneidet größere Bilder ab. TARGOBANK platziert das Logo ganz oben in der Warenkorbübersicht.
			</td>
		</tr>
		<tr>
			<td>
				<b>Warenkorbumrandung</b>
			</td>
			<td>
				Der hexadezimale HTML-Code der Haupterkennungsfarbe des Shops. Diese Farbe verläuft in einem Rahmen um die Warenkorbübersicht in der Benutzeroberfläche der Kaufabwicklung stufenlos zu weiß.
			</td>
		</tr>
		<tr>
			<td>
				<b>Zeitpunkt TARGOBANK-Zahlungseinzug</b>
			</td>
			<td>
				<strong>Sale (sofortiger Zahlungseinzug):</strong> Zahlung direkt nach Abschluss der Bestellung einziehen.
			</td>
		</tr>
	</tbody>
</table>

## Zahlungsarten verwalten

In diesem Abschnitt erfahren Sie, wie Sie die verschiedenen von TARGOBANK angebotenen Zahlungsarten in Ihrem Webshop anbieten.

### TARGOBANK PLUS aktivieren

Nachdem Sie das TARGOBANK-Plugin installiert und Ihr Konto eingerichtet haben, ist TARGOBANK ohne weitere Einstellungen als Zahlungsart verfügbar. Diese Zahlungsart erscheint in der Kaufabwicklung je nach Priorität neben den anderen aktivierten Zahlungsarten.<br />Gehen Sie wie im Folgenden beschrieben vor, um TARGOBANK PLUS zu aktivieren. Die TARGOBANK PLUS Wall gibt Ihren Kunden die Möglichkeit, ihren Einkauf mit Deutschlands beliebtesten Zahlungsarten TARGOBANK, Lastschrift, Kreditkarte sowie Kauf auf Rechnung zu bezahlen – sogar ohne ein TARGOBANK-Konto. 

##### TARGOBANK PLUS aktivieren:

1. Öffnen Sie das Menü **Einstellungen » Aufträge » TARGOBANK » TARGOBANK / TARGOBANK PLUS**.
2. Wählen Sie einen Mandanten.
3. Nehmen Sie die Einstellungen vor. Beachten Sie dazu die Erläuterungen in Tabelle 2.
4. **Speichern** Sie die Einstellungen.

<table>
<caption>Tab. 2: TARGOBANK-PLUS-Einstellungen vornehmen</caption>
	<thead>
		<th>
			Einstellung
		</th>
		<th>
			Erläuterung
		</th>
	</thead>
	<tbody>
		<tr>
		<td class="th" align=CENTER colspan="2">Allgemein</td>
		</tr>
		<tr>
			<td>
				<b>Aktives Konto</b>
			</td>
			<td>Das TARGOBANK-Konto, für das die Einstellungen gelten. Dieses Konto muss für jeden in der linken Spalte verfügbaren Mandanten einzeln eingestellt werden. Es ist möglich, ein Konto bei mehreren Mandanten als aktives Konto zu wählen.</td>
		</tr>
		<tr>
			<td>
				<b>Priorität</b>
			</td>
			<td>Bestimmt, an welcher Stelle TARGOBANK in der Kaufabwicklung steht, wenn TARGOBANK PLUS nicht verwendet wird.</td>
		</tr>
		<tr>
		<td class="th" align=CENTER colspan="2">TARGOBANK PLUS</td>
		</tr>
		<tr>
			<td>
				<b>Aktivieren</b>
			</td>
			<td>
				TARGOBANK PLUS Wall in der Kaufabwicklung aktivieren. Mindestens einen Container <a href="#10."><strong>verknüpfen</strong></a>, um die TARGOBANK PLUS Wall zu nutzen. 			
			</td>
		</tr>
		<tr>
		<td class="th" align=CENTER colspan="2">Spracheinstellungen</td>
		</tr>
		<tr>
			<td>
				<b>Sprache</b>
			</td>
			<td>
				Sprachpakete für alle Sprachen hinterlegen, in denen der Shop zugänglich ist. Stellt ein Kunde den Webshop auf eine andere Sprache um, greift TARGOBANK auf diese Sprachpakete zu.
			</td>
		</tr>
		<tr>
			<td>
				<b>Infoseite</b>
			</td>
			<td>
				Als <a href="https://www.plentymarkets.eu/handbuch/payment/bankdaten-verwalten/#2-2"><strong>Information zur Zahlungsart</strong></a> eine Kategorieseite vom Typ <strong>Content</strong> anlegen oder die URL einer Webseite eingeben.
			</td>
		</tr>
		<tr>
			<td>
				<b>Logo</b>
			</td>
			<td>
			Eine https-URL, die zum Logo-Bild führt. Gültige Dateiformate sind .gif, .jpg oder .png. Die Maximalgröße beträgt 190 Pixel in der Breite und 60 Pixel in der Höhe. TARGOBANK schneidet größere Bilder ab. TARGOBANK platziert das Logo ganz oben in der Warenkorbübersicht.
			</td>
		</tr>
		<tr>
		<td class="th" align=CENTER colspan="2">Weitere Einstellungen</td>
		</tr>
		<tr>
			<td>
				<b>Lieferländer</b>
			</td>
			<td>
				Nur für die hier eingestellten Lieferländer ist die Zahlungsart TARGOBANK freigegeben.
			</td>
		</tr>
		<tr>
			<td>
				<b>Aufpreis Webshop</b>
			</td>
			<td>
Wenn bei der Zahlung mit TARGOBANK zusätzliche Kosten berechnet werden, den Prozentwert oder Pauschalwert gemäß der Vertragskonditionen eingeben.<br />
     
<strong>Inland (Pauschal):</strong> Pauschalen Wert eingeben, der bei Aufträgen berücksichtigt wird, bei denen das Systemland gewählt wurde. Diese Kosten werden im Bestellvorgang bei der Wahl der Zahlungsart zum Auftrag addiert. Der Betrag fließt in die Gesamtsumme des Auftrags ein und wird nicht einzeln ausgewiesen.<br />

<strong>Inland (Prozentual):</strong> Prozentualen Wert eingeben, der bei Aufträgen berücksichtigt wird, bei denen das Systemland gewählt wurde.<br />
   
<strong>Ausland (Pauschal):</strong> Pauschalen Wert eingeben, der bei Aufträgen berücksichtigt wird, bei denen nicht das Systemland gewählt wurde. Diese Kosten werden im Bestellvorgang bei der Wahl der Zahlungsart zum Auftrag addiert. Der Betrag fließt in die Gesamtsumme des Auftrags ein und wird nicht einzeln ausgewiesen.<br />

<strong>Ausland (Prozentual):</strong> Prozentualen Wert eingeben, der bei Aufträgen berücksichtigt wird, bei denen nicht das Systemland gewählt wurde.<br />

<strong><i>Wichtig:</i></strong> Nicht in beide Felder (Pauschal und Prozentual) einen Wert eingeben.
		</tr>
	</tbody>
</table>

### Ratenzahlung aktivieren

Das Menü zur Ratenzahlung entspricht dem zu TARGOBANK PLUS; der einzige Unterschied ist die Benennung der Aktivierungsschaltfläche. Wenn Sie bereits Einstellungen unter **TARGOBANK / TARGOBANK PLUS** vorgenommen haben, können Sie diese Einstellungen hier übernehmen.

1. Öffnen Sie das Menü **Einstellungen » Aufträge » TARGOBANK » Ratenzahlung Powered by TARGOBANK**.
2. Wählen Sie einen Mandanten.
3. Nehmen Sie die Einstellungen vor. Beachten Sie dazu die Erläuterungen in Tabelle 3.
4. **Speichern** Sie die Einstellungen.

<div class="alert alert-warning" role="alert">
    <strong><i>Wichtig:</strong></i> Um diese Zahlungsart in vollem Umfang und gemäß aller rechtlichen Vorgaben zu nutzen, müssen zwingend die Container <b>TARGOBANK Installment Prepare Button</b>, <b>TARGOBANK Installment Financing Check</b> und <b>TARGOBANK Installment Financing Costs</b> <a href="#10."><strong>verknüpft</strong></a> sein.<br /> <br />
Des Weiteren ist Ratenzahlung Powered by TARGOBANK erst nach erfolgreicher Beantragung für deutsche Online-Shops ausgewählter TARGOBANK-Händler verfügbar. 
Beantragen Sie <a href="https://www.targobank.com/de/webapps/mpp/installments"><strong>hier</strong></a>  die Nutzung von Ratenzahlung Powered by TARGOBANK.
</div>

<table>
<caption>Tab. 3: Ratenzahlungseinstellungen vornehmen</caption>
	<thead>
		<th>
			Einstellung
		</th>
		<th>
			Erläuterung
		</th>
	</thead>
	<tbody>
		<tr>
		<td class="th" align=CENTER colspan="2">Allgemein</td>
		</tr>
		<tr>
			<td>
				<b>Aktives Konto</b>
			</td>
			<td>Das TARGOBANK-Konto, für das die Einstellungen gelten. Dieses Konto muss für jeden in der linken Spalte verfügbaren Mandanten einzeln eingestellt werden. Es ist möglich, ein Konto bei mehreren Mandanten als aktives Konto zu wählen.</td>
		</tr>
		<tr>
			<td>
				<b>Priorität</b>
			</td>
			<td>Bestimmt, an welcher Stelle TARGOBANK in der Kaufabwicklung steht, solange TARGOBANK PLUS nicht verwendet wird.</td>
		</tr>
		<tr>
		<td class="th" align=CENTER colspan="2">Spezifische Bewerbung mit Berechnung</td>
		</tr>
		<tr>
			<td>
				<b>Aktivieren</b>
			</td>
			<td>
				Berechnet im Hintergrund die Konditionen für den Ratenkauf. Je nach verknüpften Containern kann dies z.B. der Kauf des aktiven Artikels sein. Ist hier kein Haken gesetzt, wird nur die allgemeine Möglichkeit der Ratenzahlung beworben.			</td>
		</tr>
		<tr>
		<td class="th" align=CENTER colspan="2">Spracheinstellungen</td>
		</tr>
		<tr>
			<td>
				<b>Sprache</b>
			</td>
			<td>
				Sprachpakete für alle Sprachen hinterlegen, in denen der Shop zugänglich ist. Stellt ein Kunde den Webshop auf eine andere Sprache um, greift TARGOBANK auf diese Sprachpakete zu.
			</td>
		</tr>
		<tr>
			<td>
				<b>Infoseite</b>
			</td>
			<td>
				Als <a href="https://www.plentymarkets.eu/handbuch/payment/bankdaten-verwalten/#2-2"><strong>Information zur Zahlungsart</strong></a> eine Kategorieseite vom Typ <strong>Content</strong> anlegen oder die URL einer Webseite eingeben.
			</td>
		</tr>
		<tr>
			<td>
				<b>Logo</b>
			</td>
			<td>
				Eine https-URL, die zum Logo-Bild führt. Gültige Dateiformate sind .gif, .jpg oder .png. Die Maximalgröße beträgt 190 Pixel in der Breite und 60 Pixel in der Höhe. TARGOBANK schneidet größere Bilder ab. TARGOBANK platziert das Logo ganz oben in der Warenkorbübersicht.
			</td>
		</tr>
		<tr>
		<td class="th" align=CENTER colspan="2">Weitere Einstellungen</td>
		</tr>
		<tr>
			<td>
				<b>Lieferländer</b>
			</td>
			<td>
				Nur für die hier eingestellten Lieferländer ist die Zahlungsart TARGOBANK freigegeben.
			</td>
		</tr>
		<tr>
			<td>
				<b>Aufpreis Webshop</b>
			</td>
			<td>
Wenn bei der Zahlung mit TARGOBANK zusätzliche Kosten berechnet werden, den Prozentwert oder Pauschalwert gemäß der Vertragskonditionen eingeben.<br />
     
<strong>Inland (Pauschal):</strong> Pauschalen Wert eingeben, der bei Aufträgen berücksichtigt wird, bei denen das Systemland gewählt wurde. Diese Kosten werden im Bestellvorgang bei der Wahl der Zahlungsart zum Auftrag addiert. Der Betrag fließt in die Gesamtsumme des Auftrags ein und wird nicht einzeln ausgewiesen.<br />

<strong>Inland (Prozentual):</strong> Prozentualen Wert eingeben, der bei Aufträgen berücksichtigt wird, bei denen das Systemland gewählt wurde.<br />
   
<strong>Ausland (Pauschal):</strong> Pauschalen Wert eingeben, der bei Aufträgen berücksichtigt wird, bei denen nicht das Systemland gewählt wurde. Diese Kosten werden im Bestellvorgang bei der Wahl der Zahlungsart zum Auftrag addiert. Der Betrag fließt in die Gesamtsumme des Auftrags ein und wird nicht einzeln ausgewiesen.<br />

<strong>Ausland (Prozentual):</strong> Prozentualen Wert eingeben, der bei Aufträgen berücksichtigt wird, bei denen nicht das Systemland gewählt wurde.<br />

<strong><i>Wichtig:</i></strong> Nicht in beide Felder (Pauschal und Prozentual) einen Wert eingeben.
			</td>
		</tr>
	</tbody>
</table>

## Template-Container verknüpfen

Für die Zahlungsarten TARGOBANK PLUS, Ratenzahlung Powered by TARGOBANK und für den Express-Kauf-Button stehen Ihnen verschiedene Möglichkeiten zur Verfügung, um sie in ihren Shop einzubinden.
Hierfür sind in den Templates in plentymarkets an relevanten Stellen Container hinterlegt, die zur Individualisierung mit Inhalt gefüllt werden.

##### TARGOBANK PLUS Wall verknüpfen:

1. Klicken Sie auf **Start » Plugins**.
2. Wechseln Sie in das Tab **Content**. 
3. Wählen Sie den Bereich TARGOBANK Plus Wall.
4. Wählen Sie einen, mehrere oder ALLE Container, in denen die TARGOBANK PLUS Wall genutzt werden soll. Beachten Sie dazu die Erläuterungen in Tabelle 4.<br /> 
	→ Die Verknüpfung zu den Containern ist hergestellt.

<table>
<caption>Tab. 4: Container verknüpfen</caption>
	<thead>
		<th>
			Verknüpfung
		</th>
		<th>
			Erläuterung
		</th>
	</thead>
	<tbody>
		<tr>
		<td class="th" align=CENTER colspan="2">Allgemein</td>
		</tr>
		<tr>
        	<td>
        		<b>TARGOBANK Scripts</b>
        	</td>
        	<td>Der Container Script loader: Register/load JS muss verknüpft sein, um Scripts zu aktivieren.</td>
        		</tr>
		<tr>
			<td>
				<b>TARGOBANK Express Button</b>
			</td>
			<td>Optional: Der Express-Kauf-Button ist universell hinterlegbar, z.B. auf der Artikelseite (Single item) oder neben dem Warenkorb (Shopping cart). Er gibt dem Kunden die Möglichkeit, den Artikel oder den Inhalt des gesamten Warenkorbs sofort zu kaufen, ohne den Umweg über die Kaufabwicklung zu machen. Hierbei wird er direkt zur Zahlung weitergeleitet. Die Lieferadresse wird von TARGOBANK bereitgestellt.</td>
		</tr>
		<tr>
		<tr>
		<td class="th" align=CENTER colspan="2">TARGOBANK PLUS</td>
		</tr>
		<tr>
			<td>
				<b>TARGOBANK PLUS Wall</b>
			</td>
			<td>
				Durch die Verknüpfung im Container <strong>Checkout: Override payment method</strong> ersetzt die TARGOBANK PLUS Wall alle vorher eingestellten Zahlungsarten. Jene Zahlungsarten, die zusätzlich zu den standardmäßig in der Wall angebotenen Zahlungsarten TARGOBANK, Lastschrift, Kreditkarte sowie Kauf auf Rechnung eingestellt sind, werden in der Wall unter diesen gemäß ihrer Priorität angezeigt. <a id="10." name="10."></a>
			</td>
		</tr>
		<tr>
		<td class="th" align=CENTER colspan="2">Ratenzahlung Powered by TARGOBANK</td>
		</tr>
		<tr>
		<td class="th" align=CENTER colspan="2"><strong><i>Wichtig:</strong></i> Um diese Zahlungsart in vollem Umfang und gemäß aller rechtlichen Vorgaben zu nutzen, müssen zwingend die Container <b>TARGOBANK Installment Prepare Button</b>, <b>TARGOBANK Installment Financing Check</b> und <b>TARGOBANK Installment Financing Costs</b> verknüpft sein.
		</td>
		</tr>
		<tr>
		<td>
			<b>TARGOBANK Installment Prepare Button</b>
		</td>
			<td>
				Mit <strong>Checkout: Override "Order now" button</strong> wird die Schaltfläche <strong>Jetzt kaufen</strong> durch <strong>Ratenzahlung beantragen</strong> ersetzt, wenn die Zahlungsart Ratenzahlung Powered by TARGOBANK gewählt ist.
			</td>
			</tr>
			<tr>
			<td>
				<b>TARGOBANK Installment Financing Check</b>
			</td>
			<td>
Bei einem Klick auf den Button <strong>Ratenzahlung beantragen</strong> wird der Kunde auf die Webseite von TARGOBANK zur Auswahl der Ratenzahlungsbedingungen weitergeleitet. Im Anschluss gelangt der Kunde zurück zum Shop, da der Händler noch einmal alle Details zur Zahlung darstellen muss, bevor der Kunde den Kauf per Ratenzahlung bestätigt. Zurück im Shop öffnet sich eine Darstellung von Warenkorbwert und Finanzierungskosten. Diese Darstellung kann der Kunde nur mittels der Schaltflächen <strong>Kauf abbrechen</strong> oder <strong>Jetzt kaufen</strong> verlassen.<br />Ein Klick auf <strong>Kauf abbrechen</strong> führt zurück zur Kaufabwicklung, ein Klick auf <strong>Jetzt kaufen</strong> schließt die Ratenzahlung unwiderruflich ab.
<br />Der Financing Check muss mit einem der Container im Bereich Checkout verknüpft werden, jedoch nicht als Override, da dies wichtige Inhalte überschreiben könnte.<br />
			</td>
		</tr>
		<tr>
		<td>
				<b>TARGOBANK Installment Financing Costs</b>
			</td>
			<td>
				Nach geltendem Recht müssen bei Kaufabschluss die Finanzierungskosten dargestellt werden. Ideal ist eine Verknüpfung mit <strong>Order confirmation: Add content after totals</strong>, da die Finanzierungskosten unter dem Bruttogesamtbetrag dargestellt werden müssen. Des Weiteren werden die Finanzierungskosten ebenfalls auf der Rechnung an den Kunden gesondert ausgewiesen.
			</td>
			</tr>
			<tr>
			<td>
				<b>TARGOBANK Installment Generic Promotion</b>
			</td>
			<td>
				Optional: Stellt die allgemeine Bewerbung von Ratenzahlung Powered by TARGOBANK zur Verfügung. Alle Container verknüpfen, in denen auf Ratenzahlung Powered by TARGOBANK hingewiesen werden soll.
			</td>
		</tr>
		<tr>
			<td>
				<b>TARGOBANK Installment Specific Promotion</b>
			</td>
			<td>
Optional: Im Gegensatz zur Generic Promotion berechnet dieser Container verschiedene Ratenzahlungsmöglichkeiten für den aktuellen Artikel bzw. den Inhalt des Warenkorbs. Dabei wird die günstigste Möglichkeit – gemessen am Gesamtwert – für den Kunden ausgegeben.
			</td>
		</tr>
	</tbody>
</table>

## TARGOBANK-Zahlung automatisch zurückzahlen

Richten Sie eine Ereignisaktion ein, um die Rückzahlung einer Zahlung über TARGOBANK zu automatisieren.

##### Ereignisaktion einrichten:

1. Öffnen Sie das Menü **Einstellungen » Aufträge » Ereignisaktionen**.
2. Klicken Sie auf **Ereignisaktion hinzufügen**.
→ Das Fenster **Neue Ereignisaktion erstellen** wird geöffnet.
3. Geben Sie einen Namen ein.
4. Wählen Sie das Ereignis gemäß Tabelle 4.
5. **Speichern** Sie die Einstellungen.
6. Nehmen Sie die Einstellungen gemäß Tabelle 4 vor.
7. Setzen Sie ein Häkchen bei **Aktiv**.
8. **Speichern** Sie die Einstellungen.

<table>
	<thead>
		<th>
			Einstellung
		</th>
		<th>
			Option
		</th>
<th>
			Auswahl
		</th>
	</thead>
	<tbody>
      <tr>
         <td><strong>Ereignis</strong></td>
         <td><strong>Das Ereignis wählen, nach dem eine Rückzahlung erfolgen soll.</strong></td> 
<td></td>
      </tr>
      <tr>
         <td><strong>Filter 1</strong></td>
         <td><strong>Auftrag > Zahlungsart</strong></td>
<td><strong>TARGOBANK</strong></td>
      </tr>
      <tr>
         <td><strong>Aktion</strong></td>
         <td><strong>Plugin > Rückzahlung der TARGOBANK-Zahlung</strong></td>
<td>&nbsp;</td>
      </tr>
</tbody>
	<caption>
		Tab. 4: Ereignisaktion zur automatischen Rückzahlung der TARGOBANK-Zahlung
	</caption>
</table>


## Lizenz
 
Das gesamte Projekt unterliegt der GNU AFFERO GENERAL PUBLIC LICENSE – weitere Informationen finden Sie in der [LICENSE.md](https://github.com/plentymarkets/plugin-payment-targobank/blob/master/LICENSE.md).