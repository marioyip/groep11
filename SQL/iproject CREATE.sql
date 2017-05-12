use master

use iproject11
--DECLARE @sql NVARCHAR(MAX) = N'';

--SELECT @sql += N'
--ALTER TABLE ' + QUOTENAME(OBJECT_SCHEMA_NAME(parent_object_id))
--    + '.' + QUOTENAME(OBJECT_NAME(parent_object_id)) +
--    ' DROP CONSTRAINT ' + QUOTENAME(name) + ';'
--FROM sys.foreign_keys;

--PRINT @sql;
-- EXEC sp_executesql @sql;


--IF object_id('CheckPassword') IS NOT NULL

GO
CREATE FUNCTION CheckPassword(@pass varchar(30))
  RETURNS int
AS
  BEGIN
    DECLARE @retval int

    if len(@pass)>6 and PATINDEX('%[0-9]%', @pass) >0 and PATINDEX('%[a-zA-Z]%', @pass) >0
      SET @retval = 1
    else
      SET @retval = 0

    RETURN @retval
  END;
GO

GO
CREATE FUNCTION fnIsValidEmail(@email varchar(255))
  --Returns true if the string is a valid email address.
  RETURNS bit
As
  BEGIN
    RETURN CASE WHEN ISNULL(@email, '') <> '' AND @email LIKE '%_@%_.__%' THEN 1 ELSE 0 END
  END
GO

-- SELECT * FROM Nieuwsbrief

if not exists (select * from sysobjects where name='Nieuwsbrief')
  CREATE TABLE Nieuwsbrief (
    id int IDENTITY NOT NULL,
    name VARCHAR(70) NOT NULL,
    email VARCHAR(70) NOT NULL,
    CONSTRAINT pk_id PRIMARY KEY (email),
    CONSTRAINT ck_email CHECK (dbo.fnIsValidEmail(email) >= 1)
  )

if not exists (select * from sysobjects where name='Vraag')
  CREATE TABLE Vraag (
    TekstVraag														VARCHAR(150)									NOT NULL,
    Vraagnummer														INTEGER											NOT NULL,
    CONSTRAINT pk_vraagnummer										PRIMARY KEY										(vraagnummer)
  )

--INSERT INTO Vraag VALUES ('hallo' , 67);
if not exists (select * from sysobjects where name='Landen')
  CREATE TABLE Landen (
    Id																INT												NOT NULL,
    landafkorting													CHAR(2)											NOT NULL,
    landnaam														VARCHAR(36)										NOT NULL, -- http://www.funtrivia.com/askft/Question33835.html
    CONSTRAINT pk_naam												PRIMARY KEY										(landnaam),
  )


if not exists (select * from sysobjects where name='Gebruiker')
  CREATE TABLE Gebruiker (
    Achternaam														VARCHAR(35)										NOT NULL,		--Lange achternaam
    Straatnaam1														VARCHAR(255)									NOT NULL,		--Van adresregel1 naar straatnaam1
    Huisnummer1														TINYINT                                         NOT NULL,		--Huisnummer toegevoegd voor straat1
    Straatnaam2														VARCHAR(255)									NULL,			--Van adresregel2 naar straatnaam2
    Huisnummer2														TINYINT											  NULL,			--huisnummer toegevoegd voor straat2
    Antwoordtekst													VARCHAR(20)										NOT NULL,
    GeboorteDag														DATE											    NOT NULL,
    Mailbox															  VARCHAR(75)										NOT NULL,
    Gebruikersnaam												VARCHAR(35)										NOT NULL,
    Land															    VARCHAR(36)										NOT NULL,		--
    Plaatsnaam														VARCHAR(85)										NOT NULL,		-- http://www.alletop10lijstjes.nl/10-langste-plaatsnamen-in-de-wereld/
    Postcode														  VARCHAR(9)										NOT NULL,		-- https://en.wikipedia.org/wiki/Postal_codes
    Voornaam														  VARCHAR(20)										NOT NULL,
    Vraag															    INT									           NOT NULL,
    Wachtwoord														VARCHAR(30)										NOT NULL,
    Verkoper														  VARCHAR(4)			DEFAULT 'niet'				NOT NULL,		-- BOOLEAN??
    CONSTRAINT pk_gebuikersnaam						PRIMARY KEY										(gebruikersnaam),
    CONSTRAINT fk_GebruikerVraag_ref_VraagVraagnummer				FOREIGN KEY										(Vraag)
    REFERENCES														Vraag (vraagnummer),
    CONSTRAINT fk_GebruikerLand_ref_landnaam						FOREIGN KEY (Land)
    REFERENCES														Landen(Landnaam),
    CONSTRAINT ck_verkoper											CHECK											(Verkoper IN ('wel', 'niet')), -- Kijkt of er Wel / Niet is ingevoerd bij de vraag of de gebruiker een verkoper is
    CONSTRAINT CheckPasswordRules								CHECK											(dbo.CheckPassword(Wachtwoord) >= 1 )
  )
--INSERT INTO Landen VALUES (21,'BE', 'Belgium');
--INSERT INTO Gebruiker VALUES('Mccoy','kraanvoglstraat',93,'Appartment',19,'Lorem','1999/05/05','Nuncegestasnet','Gebruikersnaam','Belgium','Bhavnagar','30700','Preston','67','1234567j','wel');



if not exists (select * from sysobjects where name='Verkoper')
  CREATE TABLE Verkoper (
    Bank															VARCHAR(100)										NOT NULL,		--Banknamen verschillen erg van lengte daarom 20 characters maximaal voor een zo goed mogelijk resultaat
    ControleOptie													VARCHAR(15)										NOT NULL,
    Creditcardnummer												VARCHAR(19)										NULL,
    Gebruiker														VARCHAR(35)										NOT NULL,
    Bankrekening													VARCHAR(31)										NULL,			-- rekeningnummer is 19 karakters -- int(7) volgens appendix E
    CONSTRAINT pk_gebruikersnaam									PRIMARY KEY										(gebruiker),
    CONSTRAINT fk_VerkoperGebruiker_ref_GebruikerGebruikersnaam		FOREIGN KEY										(Gebruiker)
    REFERENCES														Gebruiker										(Gebruikersnaam),
    CONSTRAINT ck_controleoptienaam									CHECK											(ControleOptie IN ('Creditcard', 'Post')),
    --CONSTRAINT ck_bankOfcredit									CHECK											Als Creditcardnummer en Bankrekening allebei NULL zijn moet ייn van de twee NOT NULL worden
  )

if not exists (select * from sysobjects where name='Rubriek')
  CREATE TABLE Rubriek (
    Rubrieknaam														VARCHAR(255)										NOT NULL,
    Rubrieknummer													INT												NOT NULL,		-- int(3)
    Volgnr															INT IDENTITY(1,1)									NOT NULL,		-- int(2)
    Rubriek															INT												NULL,
    CONSTRAINT pk_rubrieknummer										PRIMARY KEY										(rubrieknummer),
    --CONSTRAINT fk_rubriek_ref_rubrieknummer							FOREIGN KEY										(Rubriek)
    --REFERENCES Rubriek												(rubrieknummer)
  )

if not exists (select * from sysobjects where name='Gebruikerstelefoon')
  CREATE TABLE Gebruikerstelefoon (
    Gebruiker														VARCHAR(35)										NOT NULL,
    Telefoon														VARCHAR(15)										NOT NULL,		-- https://en.wikipedia.org/wiki/E.164
    Volgnr															INTEGER											NOT NULL,		--int(2)
    CONSTRAINT pk_volgnr_gebruikersnaam								PRIMARY KEY										(Volgnr, Gebruiker),
    CONSTRAINT fk_GebrTelefoon_ref_GebrGebruikersnaam				FOREIGN KEY										(Gebruiker)
    REFERENCES														Gebruiker										(Gebruikersnaam)
  )

if not exists (select * from sysobjects where name='Voorwerp')
  CREATE TABLE Voorwerp (
    Looptijd														TINYINT				DEFAULT 7					NOT NULL ,
    LooptijdbeginDag												DATE											NOT NULL,
    LooptijdbeginTijdstip											TIME(0)											NOT NULL,
    LooptijdeindeDag												DATE											NOT NULL,
    LooptijdeindeTijdstip											TIME(0)											NOT NULL,
    Startprijs														NUMERIC(8,2)		DEFAULT 0.00				NOT NULL,
    Verkoper														VARCHAR(35)										NOT NULL,
    Koper															VARCHAR(35)										NULL,
    Verzendkosten													NUMERIC(8,2)		DEFAULT 6.95				NULL,			-- https://www.postnl.nl/tarieven/tarieven-pakketten/?country=nl
    Verkoopprijs													NUMERIC(8,2)									NOT NULL,
    Beschrijving													VARCHAR(500)									NOT NULL,		-- 500 is de limiet, varchar ipv char omdat het niet precies 500 hoeft te zijn
    Betalingswijze													VARCHAR(23)										NOT NULL,		-- kan ook verschillend zijn, bank/giro / creditcard / etc
    Betalingsinstructie												VARCHAR(50)										NULL,			-- Geen precies aantal karakters dus een varchar
    Land															VARCHAR(36)										NOT NULL,		-- http://www.funtrivia.com/askft/Question33835.html
    Plaatsnaam														VARCHAR(85)										NOT NULL,		-- http://www.alletop10lijstjes.nl/10-langste-plaatsnamen-in-de-wereld/
    Titel															VARCHAR(20)										NOT NULL,
    Verzendinstructies												VARCHAR(75)										NULL,
    Voorwerpnummer													INT IDENTITY									NOT NULL,		-- maximaal 10 getallen -- houdt lang vol ongeveer 7-8 jaar
    VeilingGesloten													BIT												NOT NULL,		-- Keuze uit 1 of 0 dus ja of nee
    VoorwerpCover													VARCHAR(255)		DEFAULT 'default.png'		NOT NULL,
    CONSTRAINT pk_voorwerpnummer									PRIMARY KEY										(voorwerpnummer),
    CONSTRAINT fk_verkoper_ref_gebruiker							FOREIGN KEY										(Verkoper)
    REFERENCES Verkoper												(Gebruiker),
    CONSTRAINT fk_Koper_ref_Gebruikersnaam							FOREIGN KEY										(Koper)
    REFERENCES Gebruiker											(Gebruikersnaam),
    CONSTRAINT ck_looptijd											CHECK											(looptijd IN(1,3,5,7,10)),
    CONSTRAINT fk_VoorwerpLand_ref_landnaam							FOREIGN KEY										(Land)
    REFERENCES Landen												(Landnaam)
  )

if not exists (select * from sysobjects where name='Feedback')
  CREATE TABLE Feedback (
    Commentaar														VARCHAR(140)									NULL,
    Dag																DATE											NOT NULL,
    Feedbacksoort													CHAR(8)											NOT NULL,
    SoortGebruiker													VARCHAR(8)										NOT NULL,		--Vragen
    Tijdstip														TIME(0)											NOT NULL,
    Voorwerp														INT IDENTITY									NOT NULL,
    CONSTRAINT pk_voorwerpnummer_koper_verkoper						PRIMARY KEY										(Voorwerp, SoortGebruiker),
    CONSTRAINT fk_FeedbackVoorwerp_ref_VoorwerpVoorwerpnummer		FOREIGN KEY										(Voorwerp)
    REFERENCES Voorwerp												(Voorwerpnummer),
    CONSTRAINT ck_feedbacksoortnaam									CHECK											(Feedbacksoort IN ('positief', 'negatief', 'neutraal')),
    CONSTRAINT ck_KoperVerkoper										CHECK											(SoortGebruiker IN ('koper','verkoper'))
  )

--INSERT INTO Feedback
--VALUES ('t','01/01/2017' ,'positief', 'koper', '00:00:00', 1),
--('t','01/01/2017' ,'negatief', 'verkoper', '00:00:00', 1)

--SELECT *
--FROM Feedback

if not exists (select * from sysobjects where name='Voorwerp in Rubriek')
  CREATE TABLE VoorwerpInRubriek (
    RubriekOpLaagsteNiveau							INTEGER											  NOT NULL,
    Voorwerp														INT IDENTITY									NOT NULL,
    CONSTRAINT pk_voorwerpnummer_rubrieknummer						PRIMARY KEY										(voorwerp, RubriekOpLaagsteNiveau),
    CONSTRAINT fk_RubriekVoorwerp_ref_VoorwerpVoorwerpnummer		FOREIGN KEY										(Voorwerp)
    REFERENCES Voorwerp												(Voorwerpnummer),
    CONSTRAINT fk_RubriekRubOpLaagsteNiv_ref_RubriekRubrieknummer	FOREIGN KEY										(RubriekOpLaagsteNiveau)
    REFERENCES Rubriek												(Rubrieknummer)
  )

if not exists (select * from sysobjects where name='Bestand')
  CREATE TABLE Bestand (
    filenaam														VARCHAR(20)			DEFAULT 'default'			NOT NULL, --van char(13) naar VARCHAR(20)
    voorwerp														INT IDENTITY									NOT NULL, -- misschien meer dan 10 dus INT
    CONSTRAINT pk_filenaam											PRIMARY KEY										(filenaam),
    CONSTRAINT fk_BestandVoorwerp_ref_VoorwerpVoorwerpnummer		FOREIGN KEY										(voorwerp)
    REFERENCES Voorwerp																								(voorwerpnummer)
  )

if not exists (select * from sysobjects where name='Bod')
  CREATE TABLE Bod (
    Bodbedrag														NUMERIC(8,2)			DEFAULT '0.00'				NOT NULL,
    Gebruiker														VARCHAR(35)										NOT NULL, --Maximaal 35
    BodDag															DATE				DEFAULT '01/01/2017'		NOT NULL, -- hier ook daytime ipv char(8)?
    BodTijdstip														TIME(0)											NOT NULL, --Huidige tijd
    Voorwerp														INT IDENTITY									NOT NULL, --INT of NUMERIC
    CONSTRAINT pk_voorwerp_bodbedrag								PRIMARY KEY										(Voorwerp, Bodbedrag),
    CONSTRAINT fk_BodVoorwerp_ref_VoorwerpVoorwerpnummer			FOREIGN KEY										(Voorwerp)
    REFERENCES Voorwerp												(voorwerpnummer),
    CONSTRAINT fk_BodGebruiker_ref_GebruikerGebruikersnaam			FOREIGN KEY										(Gebruiker)
    REFERENCES Gebruiker											(gebruikersnaam)
  )

CREATE TABLE Test
(
  tst_column1 int,
  tst_column2 VARCHAR(100),
  tst_column3 BIT,
  CONSTRAINT pk_testje PRIMARY KEY (tst_column2)
)
/* DIT IS VOOR DROPPEN VAN DE DATABASE
ALTER TABLE [dbo].[Bestand] DROP CONSTRAINT [fk_BestandVoorwerp_ref_VoorwerpVoorwerpnummer];
ALTER TABLE [dbo].[Bod] DROP CONSTRAINT [fk_BodVoorwerp_ref_VoorwerpVoorwerpnummer];
ALTER TABLE [dbo].[Bod] DROP CONSTRAINT [fk_BodGebruiker_ref_GebruikerGebruikersnaam];
ALTER TABLE [dbo].[Gebruiker] DROP CONSTRAINT [fk_GebruikerVraag_ref_VraagVraagnummer];
ALTER TABLE [dbo].[Gebruiker] DROP CONSTRAINT [fk_GebruikerLand_ref_landnaam];
ALTER TABLE [dbo].[Verkoper] DROP CONSTRAINT [fk_VerkoperGebruiker_ref_GebruikerGebruikersnaam];
ALTER TABLE [dbo].[Nieuwsbrief] DROP CONSTRAINT [pk_id];
ALTER TABLE [dbo].[Voorwerp] DROP CONSTRAINT [fk_verkoper_ref_gebruiker];
ALTER TABLE [dbo].[Voorwerp] DROP CONSTRAINT [fk_Koper_ref_Gebruikersnaam];
ALTER TABLE [dbo].[Voorwerp] DROP CONSTRAINT [fk_VoorwerpLand_ref_landnaam];
ALTER TABLE [dbo].[Gebruikerstelefoon] DROP CONSTRAINT [fk_GebrTelefoon_ref_GebrGebruikersnaam];
ALTER TABLE [dbo].[Feedback] DROP CONSTRAINT [fk_FeedbackVoorwerp_ref_VoorwerpVoorwerpnummer];
ALTER TABLE [dbo].[VoorwerpInRubriek] DROP CONSTRAINT [fk_RubriekVoorwerp_ref_VoorwerpVoorwerpnummer];
ALTER TABLE [dbo].[VoorwerpInRubriek] DROP CONSTRAINT [fk_RubriekRubOpLaagsteNiv_ref_RubriekRubrieknummer];
ALTER TABLE [dbo].[Test] DROP CONSTRAINT [pk_testje];
DROP TABLE [Nieuwsbrief];
DROP TABLE [Vraag];
DROP TABLE [Landen];
DROP TABLE [Gebruiker];
DROP TABLE [Verkoper];
DROP TABLE [Rubriek];
DROP TABLE [Gebruikerstelefoon];
DROP TABLE [Voorwerp];
DROP TABLE [Feedback];
DROP TABLE [VoorwerpInRubriek];
DROP TABLE [Bestand];
DROP TABLE [Bod];
DROP TABLE [Test];

BEGIN
  DROP FUNCTION [dbo].[CheckPassword]
  DROP FUNCTION [dbo].[fnIsValidEmail]
END
GO
*/

-- ALTER TABLE [dbo].[Rubriek] DROP CONSTRAINT [fk_rubriek_ref_rubrieknummer];