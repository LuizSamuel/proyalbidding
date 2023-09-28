    <style>
            .clog{
                background-color: moccasin;
                padding-top: 10%;
                margin-bottom: 2%;
            } 
            .xam{
                text-transform: uppercase;
                text-align: center;
                color: white;
                font-weight: bold;

            }
            .bovis{
                background-color: slategray;
                width: 70%;
                border-radius: 2%;
                margin-top: 1.9rem;
            }
            .hr{
                width: 5%;
               border: 1.5px solid;
               color: mintcream;
            }
            </style>
 <!-- Masthead-->
        <header class="clog">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center"><br>
                    <br>
                    <br><div class="bovis">
                    	 <h1 class="xam">About Us</h1>
                        <hr class="hr" />
                    </div>
                    
                </div>
            </div>
         
        </header>

    <section class="page-section">
        <div class="container">
    <?php echo html_entity_decode($_SESSION['system']['about_content']) ?>        
            
        </div>
        </section>