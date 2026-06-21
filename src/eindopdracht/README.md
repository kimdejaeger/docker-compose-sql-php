Optie 3 — Chrome zelf uitschakelen

Chrome heeft geen normale instelling om HTML5-validatie globaal uit te zetten. Je kunt wel met Developer Tools testen:

Open de pagina
Druk op F12 (DevTools)
Ga naar Console
Voer uit:

document.querySelectorAll("form").forEach(f => f.noValidate = true);

Dit schakelt validatie uit voor formulieren op die pagina.
