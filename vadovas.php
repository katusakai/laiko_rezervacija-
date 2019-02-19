<?php include("includes/header.php"); ?>


        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">
                <h2 class="page-header">
                    Vartojimo aprašymas
                    <small> (pašalinti įdiegus) </small>
                </h2>    
                <div class="container">
                    <ul class="list-group">
                    <li class="list-group-item">
                        Į sistemą atėjęs vartotojas gali matyti laisvų laikų kiekį tam tikrą dieną.<br>
                        Pagal nutylėjimą užkraunama šiandienos diena.<br>
                        Pasirinkus rezervacijos datą , dešinėje atsiranda lentelė su visais galimais laikais tą dieną.<br>
                        Užpildžius visus laukus teisingai išmetamas pranešimas apie registraciją ir jos informacija.<br>
                        Registruotis iš to paties kompiuterio galima tik vieną kartą. <br>
                        Norint pakeisti rezervacija reikia ją atšaukti ir rezervuotis iš naujo.
                    </li>
                    <li class="list-group-item">
                        Viršuje yra prisijungimas KIRPĖJOMS.<br>
                        Sukurti du vartotojų tipai: <b>Administratorius</b> ir <b>Kirpėja</b>.<br>
                        Pirminiai duomenys administratoriaus prisijungimui:
                        <ul>
                            <li>Vartotojo vardas- <u>admin</u></li>
                            <li>Slaptažodis- <u>admin</u></li>
                        </ul>
                        Pirminiai duomenys vienos iš kirpėjų prisijungimui:
                        <ul>
                            <li>Vartotojo vardas- <u>kirpeja</u></li>
                            <li>Slaptažodis- <u>kirpeja</u></li>
                        </ul>
                        Vėliau šiuos duomenis galima pakeisti.
                    </li>
                    <li class="list-group-item">
                        Darbuotojų puslapyje iš karto užkraunamas rezervacijų sąrašas.<br>
                        Yra paieška, kuri ieško pagal vardą, pavardę, el. pašto adresą, telefono numerį, rezervacijos dieną.<br>
                        Sistemoje galimas rezultatų rikiavimas pagal visus matomus duomenis, tereikia paspausti ant stulpelio pavadinimo lentelės viršuje.<br>
                        Įrašus gali trinti tik administratoriaus teises turintis vartotojas, arba žmogus sukūręs įrašą.<br>
                        Rodomi pirmi 20 įrašų. Jeigu įrašų lange yra daugiau, reikia spausti į sekantį puslapį lentelės apačioje.
                    </li>
                    <li class="list-group-item">
                        Ties kiekvienu įrašu rodoma jį sukūrusio darbuotojo vardas ir pavardė.<br>
                        Jeigu įrašą kūrė klientas per klientų sistemą- rašoma <u>Klientas</u>.<br>
                        Ties kiekvienu įrašu rodoma kelintą kartą žmogus yra užsirezervavęs sistemoje. Kad skaičiavimas atitiktų, turi sutapti vardas ir pavardė.<br>
                        Ties penktu kliento apsilankymu parašomas tekstas, primenantis apie reikalingą nuolaidą.
                    </li>
                    <li class="list-group-item">
                       Sukurtos dvi papildomos nuorodos nuvedančios į šiandienos ir rytojaus rezervacijų sąrašus.
                    </li>

                    <li class="list-group-item">
                       Sistemoje rodomas darbuotojų sąrašas su jų prisijungimo vardu, pavarde ir teisėmis.<br>
                       Vartotojus gali kurti ir trinti tik administratoriaus teises turintis vartotojas. 
                    </li>
                    
                    </ul>
                </div>
            </div>

        </div>
        <!-- /.row -->

        <?php include("includes/footer.php"); ?>
