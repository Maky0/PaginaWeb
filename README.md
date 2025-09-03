Showcase video: https://www.youtube.com/watch?v=If7W1yWIFO4

//Generali

- La pagina principale e' LoginPage.php, dalla quale e' possibile raggiungere ogni pagina necessaria.

- Il login, o registrazione, richiedono Username e Password.

- Username e' case INSENSITIVE.

- La password e' case SENSITIVE

- Dopo aver fatto la registrazione e login, ogni utente puo' vedere i propri eventi segnati. Inolte, e' possibile aggiungere nuovi eventi premendo il pulsante "Nuovo Evento" - che porta ad un'altra pagina dove si possono inserire i dati necessari.

- In qualsiasi momento e' possibile tornare alla pagina precedente premento il pulsante in alto a sinistra


//Codice

- Sono presenti un totale di 8 file nei quali si trova codice in php, html, css e javascript 

- NON spostare i file in altre cartelle. Possono essere spostati fuori dalla cartella 'Codice', ma devono mantenere le stesse relazioni tra di loro

- Alcuni file sono riusati da vecchi progetti, quindi potrebbero esserci nomi strani come Pazienti etc.

- Il codice e' commentato il piu' possibile, evitando di ricommentare le stesse cose in caso vengano riusate.

- Nel file CheckPage.php e' possibile togliere il commento su riga 52 ed usarlo per rimpiazzare la riga precedente. Facendo cosi ogni volta che fallira' il login per colpa di una password errata, la password giusta verra' stampata. 


//Database

- Nella cartella sono presenti file che descrivono tramite modello ER e Logico il funzionamento del DB.

- E' pure presente lo stesso database che, importato in phpmyadmin, rende il tutto funzionante.

- Nel database sono gia presenti alcuni inserimenti.

- Per vedere dettagli come password e nomi degli utenti, basta controllare la tabella 'utenti' in phpmyadmin

- I dati NON sono nascosti


//Connessione

- Avviare Apache e MySql su XAMPP

- Importare database su phpmyadmin



