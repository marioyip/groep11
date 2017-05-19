/**************************************************************
** Bestandsnaam:		Constraints - Overige beperkingsregels.sql
** Projectgroep:		11
** Datum:				17 mei 2017
**************************************************************/

--B1 Tabellen Verkoper en Gebruiker:
--Tabellen Verkoper en Gebruiker:
--Kolom Verkoper(Gebruiker) moet uitsluitend alle gebruikers bevatten, die in kolom Gebruiker(Verkoper?) de waarde ‘wel’ hebben.
ALTER TABLE Verkoper ADD CONSTRAINT CHK_IsVerkoper CHECK (dbo.[CheckIsSeller](Verkoper) = 1)
GO

CREATE FUNCTION [dbo].[CheckIsSeller] (@gebruikersnaam VARCHAR(30))
RETURNS BIT
AS
BEGIN
	DECLARE @return BIT;

	SELECT @return = verkoper
	FROM Gebruiker
	WHERE gebruikersnaam = @gebruikersnaam

	RETURN @return
END;
GO

------------------------
--B2 Tabel Verkoper:
--Als kolom Controle-optie de waarde ‘Creditcard’ heeft, dan moet kolom Creditcard een waarde bevatten, en anders moet kolom Creditcard een NULL-waarde bevatten.
ALTER TABLE Verkoper 
ADD CONSTRAINT CHK_CreditcardAvailable 
CHECK (([ControleOptie] = 'Creditcard') AND [Creditcardnummer] IS NOT NULL);
GO

------------------------
--B3 Tabel Verkoper:
--In één tupel mogen kolommen Bankrekening en Creditcard niet allebei een NULL-waarde bevatten 
--(voor elke verkoper moet ofwel een bankrekening ofwel een creditcard bekend zijn (allebei mag ook)).
ALTER TABLE Verkoper ADD CONSTRAINT CHK_CreditcardOrAccountNumberNull 
CHECK (	Bankrekening = NULL	AND Creditcardnummer = NULL	);
GO

CREATE FUNCTION [dbo].[Control_Creditcard_Not_Null] (
	@control_option VARCHAR(15)
	,@creditcard VARCHAR(25)
	)
RETURNS BIT
AS
BEGIN
	DECLARE @returns BIT = 'True';

	IF (@control_option = 'creditcard')
		IF (@creditcard = NULL)
			SET @returns = 'False';

	RETURN @returns;
END;
GO

------------------------
--B4 Tabel Bestand:
--Per voorwerp kunnen maximaal 4 afbeeldingen opgeslagen worden.
ALTER TABLE Bestand 
ADD CONSTRAINT CHK_CheckMaxFour
CHECK (dbo.Contol_NOT_more_then_4_images(product_id) = 1);
GO

CREATE FUNCTION [dbo].[Contol_not_more_then_4_images] (@product_number INT)
RETURNS INT
AS
BEGIN
	DECLARE @LessThenFour BIT = 'False';
	DECLARE @number INT

	SELECT @number = COUNT(filenaam)
	FROM Bestand
	WHERE filenaam = @product_number

	IF (@number < 5)
		SET @LessThenFour = 'True'

	RETURN @LessThenFour;
END;
GO

------------------------
--B5 - Tabel Bod
--Een nieuw bod moet hoger zijn dan al 
--bestaande bedragen die geboden zijn voor hetzelfde voorwerp, 
--en tenminste zoveel hoger als de minimumverhoging voorschrijft
ALTER TABLE Bod 
ADD CONSTRAINT CHK_CheckIfOfferIsHighest 
CHECK (dbo.CheckHighestOffer(product_id, amount) = 1)
GO

CREATE FUNCTION [dbo].[CheckHighestOffer] (
	@voorwerpnummer INT
	,@bodbedrag NUMERIC(10, 2)
	)
RETURNS BIT
AS
BEGIN
	DECLARE @hoogstebod NUMERIC(10, 2);
	DECLARE @startprijs NUMERIC(10, 2);

	SELECT @startprijs = Startprijs
	FROM Voorwerp
	WHERE Voorwerpnummer = @voorwerpnummer

	SET @hoogstebod = (
			SELECT TOP (1) bodbedrag
			FROM Bod
			WHERE Voorwerp = @voorwerpnummer
				AND NOT  bodbedrag = @startprijs
			ORDER BY bodbedrag DESC
			)

	IF (@hoogstebod < @startprijs)
	BEGIN
		RETURN 1
	END

	RETURN 0
END;
GO

------------------------
--B6 Tabellen Bod en Voorwerp:
--Een gebruiker mag geen bod op één van zijn/haar eigen voorwerpen uitbrengen.
ALTER TABLE Bod 
ADD CONSTRAINT CHK_CheckIfOfferIsNotHisOwn 
CHECK (dbo.CheckIfOfferFromSeller(product_id, gebruikersnaam) = 1)
GO

CREATE FUNCTION [dbo].[CheckIfOfferFromSeller] (
	@voorwerpnummer INT
	,@gebruikersnaam VARCHAR(30)
	)
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
END;
GO

------------------------