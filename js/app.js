// Navbar

const nav = document.querySelector(".nav-mobile");
const op = document.querySelector(".op-mobile");
const search = document.querySelector(".cont-search-mobile");
const icons = document.querySelector(".nav-icons-mobile");
const ham = document.querySelector(".ham");

function abrirNav() {
  nav.classList.add("ativa");
  op.classList.add("ativa");
  search.classList.add("ativa");
  icons.classList.add("ativa");
  ham.removeEventListener("click", abrirNav);
  ham.addEventListener("click", fecharNav);
}

function fecharNav() {
  nav.classList.remove("ativa");
  ham.removeEventListener("click", fecharNav);
  ham.addEventListener("click", abrirNav);
}

// Navbar

// Cards Gerentes

const btnadic = document.querySelector(".adic-btn");
const adic = document.querySelector(".cards-adic");

function cardAdic() {
  adic.classList.add("ativa-card");
  btnadic.removeEventListener(
    "click",
    cardAdic,
    cli.classList.remove("ativa-card"),
    edit.classList.remove("ativa-card")
  );
  btnadic.addEventListener("click", fecharCard);
}

function fecharCard() {
  adic.classList.remove("ativa-card");
  btnadic.removeEventListener("click", fecharCard);
  btnadic.addEventListener("click", cardAdic);
}

const btncli = document.querySelector(".cli-btn");
const cli = document.querySelector(".cards-cli");

function cardCli() {
  cli.classList.add("ativa-card");
  btncli.removeEventListener(
    "click",
    cardCli,
    adic.classList.remove("ativa-card"),
    edit.classList.remove("ativa-card")
  );
  btncli.addEventListener("click", fecharCardCli);
}

function fecharCardCli() {
  cli.classList.remove("ativa-card");
  btncli.removeEventListener("click", fecharCardCli);
  btncli.addEventListener("click", cardCli);
}

const btnedit = document.querySelector(".edit-btn");
const edit = document.querySelector(".cards-edit");

function cardEdit() {
  edit.classList.add("ativa-card");
  btnedit.removeEventListener(
    "click",
    cardEdit,
    adic.classList.remove("ativa-card"),
    cli.classList.remove("ativa-card")
  );
  btnedit.addEventListener("click", fecharCardEdit);
}

function fecharCardEdit() {
  edit.classList.remove("ativa-card");
  btnedit.removeEventListener("click", fecharCardEdit);
  btnedit.addEventListener("click", cardEdit);
}

// const btngerente = document.querySelector(".ger-btn");
// const ger = document.querySelector(".cards-ger");

// function cardGerente() {
//     ger.classList.add("ativa-card");
//     btngerente.removeEventListener("click", cardGerente, adic.classList.remove("ativa-card"), cli.classList.remove("ativa-card"));
//     btngerente.addEventListener("click", fecharCardGerente);
// }

// function fecharCardGerente() {
//     ger.classList.remove("ativa-card");
//     btngerente.removeEventListener("click", fecharCardGerente);
//     btngerente.addEventListener("click", cardGerente);
// }


// Cards Gerentes
