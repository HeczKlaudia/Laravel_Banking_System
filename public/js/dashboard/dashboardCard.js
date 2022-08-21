class Card {
    constructor(elem, adat, bankok) {
        this.elem = elem;
        this.adat = adat;
        this.bankok = bankok;
        this.szamlaNev = this.elem.find(".szamlanev");
        this.egyenleg = this.elem.find(".egyenleg");
        this.hitelkeret = this.elem.find(".hitelkeret");

        this.setAdat(adat);
    }

    setAdat(adat) {
        this.szamlaNev.text(adat.tipus);
        this.egyenleg.text(adat.nev);
        this.hitelkeret.text(adat.hitelkeret);
    }
}
