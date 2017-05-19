/**************************************************************
** Bestandsnaam:		Hugo fixed This Shit
** Projectgroep:		11
** Datum:				19 mei 2017
**************************************************************/

USE master

USE iproject11



GO
CREATE FUNCTION CheckPassword(@pass VARCHAR(255))
  RETURNS INT
AS
  BEGIN
    DECLARE @retval INT

    IF len(@pass) > 6 AND PATINDEX('%[0-9]%', @pass) > 0 AND PATINDEX('%[a-zA-Z]%', @pass) > 0
      SET @retval = 1
    ELSE
      SET @retval = 0

    RETURN @retval
  END;
GO

GO
CREATE FUNCTION fnIsValidEmail(@email VARCHAR(255))
  --Returns true if the string is a valid email address.
  RETURNS BIT
AS
  BEGIN
    RETURN CASE WHEN ISNULL(@email, '') <> '' AND @email LIKE '%_@%_.__%'
      THEN 1
           ELSE 0 END
  END
GO

GO
CREATE FUNCTION CheckIfOfferFromSeller(@voorwerpnummer INT ,@gebruikersnaam VARCHAR(255))
  RETURNS BIT
AS
  BEGIN
    DECLARE @OfferNotFromverkoper BIT = 1
    DECLARE @verkoper VARCHAR(30)

    SELECT @verkoper = Verkoper
    FROM Voorwerp
    WHERE Voorwerpnummer = @voorwerpnummer

    IF (@verkoper = @gebruikersnaam)
      SET @OfferNotFromverkoper = 0;

    RETURN @OfferNotFromverkoper
  END
GO

-- SELECT * FROM Nieuwsbrief

IF NOT exists(SELECT *
              FROM sysobjects
              WHERE name = 'Nieuwsbrief')
  CREATE TABLE Nieuwsbrief (
    id    INT IDENTITY NOT NULL,
    name  VARCHAR(255)  NOT NULL,
    email VARCHAR(255)  NOT NULL,
    CONSTRAINT pk_id PRIMARY KEY (email),
    CONSTRAINT ck_email CHECK (dbo.fnIsValidEmail(email) >= 1)
  )

IF NOT exists(SELECT *
              FROM sysobjects
              WHERE name = 'Vraag')
  CREATE TABLE Vraag (
    TekstVraag  VARCHAR(8000) NOT NULL,
    Vraagnummer INTEGER      NOT NULL,
    CONSTRAINT pk_vraagnummer PRIMARY KEY (vraagnummer)
  )


IF NOT exists(SELECT *
              FROM sysobjects
              WHERE name = 'Landen')
  CREATE TABLE Landen (
    landafkorting CHAR(2)     NOT NULL,
    landnaam      VARCHAR(350) NOT NULL, -- http://www.funtrivia.com/askft/Question33835.html
    CONSTRAINT pk_naam PRIMARY KEY (landnaam),
  )


IF NOT exists(SELECT *
              FROM sysobjects
              WHERE name = 'Gebruiker')
  CREATE TABLE Gebruiker (
    Achternaam     VARCHAR(255)                      NOT NULL, --Lange achternaam
    Straatnaam1    VARCHAR(255)                     NOT NULL, --Van adresregel1 naar straatnaam1
    Huisnummer1    SMALLINT                          NOT NULL, --Huisnummer toegevoegd voor straat1
    Straatnaam2    VARCHAR(255)                     NULL, --Van adresregel2 naar straatnaam2
    Huisnummer2    SMALLINT                          NULL, --huisnummer toegevoegd voor straat2
    Antwoordtekst  VARCHAR(500)                      NOT NULL,
    GeboorteDag    DATE                             NOT NULL,
    email          VARCHAR(255)                      NOT NULL,
    Gebruikersnaam VARCHAR(255)                      NOT NULL,
    Land           VARCHAR(350)                      NOT NULL, --
    Plaatsnaam     VARCHAR(150)                      NOT NULL, -- http://www.alletop10lijstjes.nl/10-langste-plaatsnamen-in-de-wereld/
    Postcode       VARCHAR(9)                       NOT NULL, -- https://en.wikipedia.org/wiki/Postal_codes
    Voornaam       VARCHAR(75)                      NOT NULL,
    Vraag          INT                              NOT NULL,
    Wachtwoord     VARCHAR(255)                      NOT NULL,
    Verkoper       INT									DEFAULT 0        NOT NULL,
    CONSTRAINT pk_gebuikersnaam PRIMARY KEY (gebruikersnaam),
    CONSTRAINT fk_GebruikerVraag_ref_VraagVraagnummer FOREIGN KEY (Vraag)
    REFERENCES Vraag (vraagnummer),
    CONSTRAINT fk_GebruikerLand_ref_landnaam FOREIGN KEY (Land)
    REFERENCES Landen (Landnaam),
    CONSTRAINT ck_verkoper CHECK (Verkoper IN
                                  (1, 0)), -- Kijkt of er Wel / Niet is ingevoerd bij de vraag of de gebruiker een verkoper is
    CONSTRAINT ck_PasswordRules CHECK (dbo.CheckPassword(Wachtwoord) >= 1 ),
    CONSTRAINT ck_Huisnummer1NietMin CHECK (Huisnummer1 > 0),
    CONSTRAINT ck_HuisNummer2NietMin CHECK (Huisnummer2 > 0 OR Huisnummer2 IS NULL),
    CONSTRAINT ck_Jaartal CHECK (Year(GeboorteDag) >= '1900'),
    CONSTRAINT ck_18 CHECK (Year(GeboorteDag) <= '1999')
  )


IF NOT exists(SELECT *
              FROM sysobjects
              WHERE name = 'Verkoper')
  CREATE TABLE Verkoper (
    Bank             VARCHAR(255) NOT NULL,
    ControleOptie    VARCHAR(35)  NOT NULL,
    Creditcard VARCHAR(25)  NULL,
    Gebruiker        VARCHAR(255)  NOT NULL,
    Bankrekening     VARCHAR(31)  NULL, -- rekeningnummer is 19 karakters -- int(7) volgens appendix E
    CONSTRAINT pk_gebruikersnaam PRIMARY KEY (gebruiker),
    CONSTRAINT fk_VerkoperGebruiker_ref_GebruikerGebruikersnaam FOREIGN KEY (Gebruiker)
    REFERENCES Gebruiker (Gebruikersnaam),
    CONSTRAINT ck_controleoptienaam CHECK (ControleOptie IN ('Creditcard', 'Post')),
    CONSTRAINT Ck_BankOrCreditcard CHECK(Bankrekening IS NOT NULL OR Creditcard IS NOT NULL), --B3
    CONSTRAINT Ck_CreditcardFilled CHECK(ControleOptie = 'Creditcard' AND Creditcard IS NOT NULL OR ControleOptie != 'Creditcard' AND Creditcard IS NULL) --B2
  )

IF NOT exists(SELECT *
              FROM sysobjects
              WHERE name = 'Rubriek')
  CREATE TABLE Rubriek (
    Rubrieknaam   VARCHAR(255)        NOT NULL,
    Rubrieknummer INT                 NOT NULL, -- int(3)
    Volgnr        INT IDENTITY (1, 1) NOT NULL, -- int(2)
    Rubriek       INT                 NULL,
    CONSTRAINT pk_rubrieknummer PRIMARY KEY (rubrieknummer),
    --CONSTRAINT fk_rubriek_ref_rubrieknummer							FOREIGN KEY										(Rubriek)
    --REFERENCES Rubriek												(rubrieknummer)
  )

IF NOT exists(SELECT *
              FROM sysobjects
              WHERE name = 'Gebruikerstelefoon')
  CREATE TABLE Gebruikerstelefoon (
    Gebruiker VARCHAR(255) NOT NULL,
    Telefoon  VARCHAR(25) NOT NULL, -- https://en.wikipedia.org/wiki/E.164
    Volgnr    INTEGER IDENTITY (1,1)     NOT NULL, --int(2)
    CONSTRAINT pk_volgnr_gebruikersnaam PRIMARY KEY (Volgnr, Gebruiker),
    CONSTRAINT fk_GebrTelefoon_ref_GebrGebruikersnaam FOREIGN KEY (Gebruiker)
    REFERENCES Gebruiker (Gebruikersnaam)
  )

IF NOT exists(SELECT *
              FROM sysobjects
              WHERE name = 'Voorwerp')
  CREATE TABLE Voorwerp (
    Looptijd              TINYINT DEFAULT 7                     NOT NULL,
    LooptijdbeginDag      DATE                                  NOT NULL,
    LooptijdbeginTijdstip TIME(0)                               NOT NULL,
    LooptijdeindeDag      DATE                                  NOT NULL,
    LooptijdeindeTijdstip TIME(0)                               NOT NULL,
    Startprijs            NUMERIC(8, 2) DEFAULT 0.00            NOT NULL,
    Verkoper              VARCHAR(255)                           NOT NULL,
    Koper                 VARCHAR(255)                           NULL,
    Verzendkosten         NUMERIC(8, 2) DEFAULT 6.95            NULL, -- https://www.postnl.nl/tarieven/tarieven-pakketten/?country=nl
    Verkoopprijs          NUMERIC(8, 2)                         NOT NULL,
    Beschrijving          VARCHAR(500)                          NOT NULL, -- 500 is de limiet, varchar ipv char omdat het niet precies 500 hoeft te zijn
    Betalingswijze        VARCHAR(255)                           NOT NULL, -- kan ook verschillend zijn, bank/giro / creditcard / etc
    Betalingsinstructie   VARCHAR(500)                           NULL, -- Geen precies aantal karakters dus een varchar
    Land                  VARCHAR(350)                           NOT NULL, -- http://www.funtrivia.com/askft/Question33835.html
    Plaatsnaam            VARCHAR(150)                           NOT NULL, -- http://www.alletop10lijstjes.nl/10-langste-plaatsnamen-in-de-wereld/
    Titel                 VARCHAR(50)                           NOT NULL,
    Verzendinstructies    VARCHAR(500)                           NULL,
    Voorwerpnummer        INT IDENTITY                          NOT NULL, -- maximaal 10 getallen -- houdt lang vol ongeveer 7-8 jaar
    VeilingGesloten       BIT                                   NOT NULL, -- Keuze uit 1 of 0 dus ja of nee
    VoorwerpCover         VARCHAR(255) DEFAULT 'default.png'    NOT NULL,
    CONSTRAINT pk_voorwerpnummer PRIMARY KEY (voorwerpnummer),
    CONSTRAINT fk_verkoper_ref_gebruiker FOREIGN KEY (Verkoper)
    REFERENCES Verkoper (Gebruiker),
    CONSTRAINT fk_Koper_ref_Gebruikersnaam FOREIGN KEY (Koper)
    REFERENCES Gebruiker (Gebruikersnaam),
    CONSTRAINT ck_looptijd CHECK (looptijd IN (1, 3, 5, 7, 10)),
    CONSTRAINT fk_VoorwerpLand_ref_landnaam FOREIGN KEY (Land)
    REFERENCES Landen (Landnaam),
    CONSTRAINT ck_betalingswijze CHECK (betalingswijze='Contant' OR betalingswijze='Bank/Giro' OR betalingswijze='Paypal')
  )

IF NOT exists(SELECT *
              FROM sysobjects
              WHERE name = 'Feedback')
  CREATE TABLE Feedback (
    Commentaar     VARCHAR(500) NULL,
    Dag            DATE         NOT NULL,
    Feedbacksoort  CHAR(8)      NOT NULL,
    SoortGebruiker VARCHAR(8)   NOT NULL, --Verkoper Koper
    Tijdstip       TIME(0)      NOT NULL,
    Voorwerp       INT NOT NULL,
    CONSTRAINT pk_voorwerpnummer_koper_verkoper PRIMARY KEY (Voorwerp, SoortGebruiker),
    CONSTRAINT fk_FeedbackVoorwerp_ref_VoorwerpVoorwerpnummer FOREIGN KEY (Voorwerp)
    REFERENCES Voorwerp (Voorwerpnummer),
    CONSTRAINT ck_feedbacksoortnaam CHECK (Feedbacksoort IN ('positief', 'negatief', 'neutraal')),
    CONSTRAINT ck_KoperVerkoper CHECK (SoortGebruiker IN ('koper', 'verkoper'))
  )


IF NOT exists(SELECT *
              FROM sysobjects
              WHERE name = 'Voorwerp in Rubriek')
  CREATE TABLE VoorwerpInRubriek (
    RubriekOpLaagsteNiveau INTEGER				NOT NULL,
    Voorwerp               INT IDENTITY (1,1)	NOT NULL,
    CONSTRAINT pk_voorwerpnummer_rubrieknummer PRIMARY KEY (voorwerp, RubriekOpLaagsteNiveau),
    CONSTRAINT fk_RubriekVoorwerp_ref_VoorwerpVoorwerpnummer FOREIGN KEY (Voorwerp)
    REFERENCES Voorwerp (Voorwerpnummer),
    CONSTRAINT fk_RubriekRubOpLaagsteNiv_ref_RubriekRubrieknummer FOREIGN KEY (RubriekOpLaagsteNiveau)
    REFERENCES Rubriek (Rubrieknummer)
  )

IF NOT exists(SELECT *
              FROM sysobjects
              WHERE name = 'Bestand')
  CREATE TABLE Bestand (
    filenaam VARCHAR(255) DEFAULT 'default'      NOT NULL, --van char(13) naar VARCHAR(20)
    voorwerp INT                      NOT NULL, -- misschien meer dan 10 dus INT
    CONSTRAINT pk_filenaam PRIMARY KEY (filenaam),
    CONSTRAINT fk_BestandVoorwerp_ref_VoorwerpVoorwerpnummer FOREIGN KEY (voorwerp)
    REFERENCES Voorwerp (voorwerpnummer)
  )

IF NOT exists(SELECT *
              FROM sysobjects
              WHERE name = 'Bod')
  CREATE TABLE Bod (
    Bodbedrag   NUMERIC(8, 2) DEFAULT '0.00'        NOT NULL,
    Gebruiker   VARCHAR(255)                         NOT NULL, --Maximaal 35
    BodDag      DATE DEFAULT '01/01/2017'           NOT NULL, -- hier ook daytime ipv char(8)?
    BodTijdstip TIME(0)                             NOT NULL, --Huidige tijd
    Voorwerp    INT                    NOT NULL, --INT of NUMERIC
    CONSTRAINT pk_voorwerp_bodbedrag PRIMARY KEY (Voorwerp, Bodbedrag),
    CONSTRAINT fk_BodVoorwerp_ref_VoorwerpVoorwerpnummer FOREIGN KEY (Voorwerp)
    REFERENCES Voorwerp (voorwerpnummer),
    CONSTRAINT fk_BodGebruiker_ref_GebruikerGebruikersnaam FOREIGN KEY (Gebruiker)
    REFERENCES Gebruiker (gebruikersnaam),
    CONSTRAINT CHK_CheckIfOfferIsNotHisOwn CHECK (dbo.CheckIfOfferFromSeller(voorwerp, Gebruiker) = 1)
  )

--B5
GO
CREATE TRIGGER BodbedragHoger ON Bod
FOR INSERT, UPDATE
AS
  BEGIN
    DECLARE @ID NUMERIC(12)
    SET @ID = (SELECT TOP 1 Voorwerp FROM inserted)
    DECLARE @BodBedrag NUMERIC(8,2)
    SET @BodBedrag = (SELECT BodBedrag FROM inserted)
    DECLARE @vorig_bod NUMERIC(8,2);
    SET @vorig_bod = (SELECT TOP 1 Bodbedrag FROM Bod WHERE Bodbedrag NOT IN (SELECT TOP 1 Bodbedrag FROM Bod WHERE Bod.Voorwerp = @ID ORDER BY Bodbedrag DESC) AND Bod.Voorwerp = @ID ORDER BY Bodbedrag DESC);
    IF @vorig_bod>0.0
      BEGIN
        IF @BodBedrag>0.99 AND @BodBedrag > @vorig_bod -- Groter dan 1 en groter dan vorig bod
          BEGIN
            IF @BodBedrag >0.99 AND @BodBedrag <50
              BEGIN
                IF @BodBedrag-@vorig_bod<0.50
                  BEGIN
                    RAISERROR ('Een bod tussen 1 en 50 Euro moet met minimaal 50 eurocent worden verhoogd',16,1);
                    ROLLBACK
                  END
              END
            IF @BodBedrag>49.99 AND @BodBedrag<500
              BEGIN
                IF @BodBedrag-@vorig_bod<1.00
                  BEGIN
                    RAISERROR ('Een bod tussen 50 en 500 Euro moet met minimaal 1 euro worden verhoogd',16,1);
                    ROLLBACK
                  END
              END
            IF @BodBedrag>499.99 AND @BodBedrag<1000
              BEGIN
                IF @BodBedrag-@vorig_bod<5.00
                  BEGIN
                    RAISERROR ('Een bod tussen 500 en 1000 Euro moet met minimaal 5 euro worden verhoogd',16,1);
                    ROLLBACK
                  END
              END
            IF @BodBedrag>999.99 AND @BodBedrag<5000
              BEGIN
                IF @BodBedrag-@vorig_bod<10.00
                  BEGIN
                    RAISERROR ('Een bod tussen 1000 en 5000 Euro moet met minimaal 10 euro worden verhoogd',16,1);
                    ROLLBACK
                  END
              END
            IF @BodBedrag>5000
              BEGIN
                IF @BodBedrag-@vorig_bod<50.00
                  BEGIN
                    RAISERROR ('Een bod vanaf 5000 Euro moet met minimaal 50 euro worden verhoogd',16,1);
                    ROLLBACK
                  END
              END
          END
        ELSE
          BEGIN
            RAISERROR ('Bod is kleiner dan of gelijk aan huidige hoogste bod',16,1);
            ROLLBACK
          END
      END
  END

-- B1
Go
CREATE TRIGGER Verkoper_Gebruiker_Moet_verkoper ON Verkoper
FOR INSERT,UPDATE
AS
  BEGIN
    IF EXISTS(SELECT 1 FROM Gebruiker,Verkoper WHERE Verkoper.Gebruiker = Gebruiker.gebruikersnaam AND Gebruiker.Verkoper = 0)
      BEGIN
        RAISERROR ('Verkoper staat niet als verkopende gebruiker geregistreerd!',16,1)
        ROLLBACK
      END
  END


GO
CREATE TRIGGER Gebruiker_Niet_Bieden_Eigen_Bod ON Bod
FOR INSERT,UPDATE
AS
  BEGIN
    IF EXISTS(SELECT 1 FROM Gebruiker,Verkoper WHERE Verkoper.Gebruiker = Gebruiker.gebruikersnaam AND Gebruiker.Verkoper = 0)
      BEGIN
        RAISERROR ('Verkoper staat niet als verkopende gebruiker geregistreerd!',16,1)
        ROLLBACK
      END
  END




--B4
Go
CREATE TRIGGER Max_vier_bestanden_per_voorwerp ON Bestand
FOR INSERT
AS
  BEGIN
    DECLARE @ID NUMERIC(12)
    SET @ID = (SELECT TOP 1 Voorwerp FROM inserted)
    IF (SELECT COUNT(*) FROM Bestand WHERE Bestand.Voorwerp=@ID)>4
      BEGIN
        RAISERROR ('Één voorwerp mag maximaal vier bestanden hebben',16,1)
        ROLLBACK
      END
  END



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

BEGIN
  DROP FUNCTION [dbo].[CheckPassword]
  DROP FUNCTION [dbo].[fnIsValidEmail]
  DROP FUNCTION [dbo].[CheckIfOfferFromSeller]
END
GO
*/

