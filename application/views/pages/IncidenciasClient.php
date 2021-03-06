<head>
    <title>Pagina principal</title>
</head>

<section>


    <div class="container-fluid">


        <div class="container container-flex w-100" style="padding-top:30px">

                <div class="card-body">
                    <label for="buscador">Buscar incidencias:</label>
                    <input onkeyup="buscar()" class="form-control" type='text' id="search" placeholder='Buscar por título'>
                </div>
        </div>


        <div class="row d-flex justify-content-center" id="incidencias">

            <?php foreach ($incidencies as $incidencies_item) : ?>
                <div id="cardColor<?php echo $incidencies_item['id_incidencia'] ?>" class="text-center mt-5 mr-5 card">
                    <div class="card-header"><?php echo $incidencies_item['desc_averia'] ?></div>
                    <div class="card-body">
                        <div style="display:none;"><?php echo $incidencies_item['uuid'] ?></div>
                        <p class="card-text">
                            <?php echo $incidencies_item['Diagnostico_prev'] ?>
                        </p>


                        <hr>

                        <?php
                        if ($incidencies_item['id_Estado'] == '') { ?>
                            <span><img src="<?php echo base_url("assets/img/Notstarted.png") ?>" /> No asignado</span>
                            <script type="text/javascript">
                                document.getElementById("cardColor<?php echo $incidencies_item['id_incidencia'] ?>").classList.add('card-danger');
                            </script>
                        <?php } ?>

                        <?php if ($incidencies_item['id_Estado'] == 1) { ?>
                            <span><img src="<?php echo base_url("assets/img/Notstarted.png") ?>" /> No empezado</span>
                            <script type="text/javascript">
                                document.getElementById("cardColor<?php echo $incidencies_item['id_incidencia'] ?>").classList.add('card-light');
                            </script>
                        <?php } ?>

                        <?php if ($incidencies_item['id_Estado'] == 2) { ?>
                            <span><img src="<?php echo base_url("assets/img/Working.png") ?>" /> En curso</span>
                            <script type="text/javascript">
                                document.getElementById("cardColor<?php echo $incidencies_item['id_incidencia'] ?>").classList.add('card-warning');
                            </script>
                        <?php } ?>

                        <?php if ($incidencies_item['id_Estado'] == 3) { ?>
                            <span><img src="<?php echo base_url("assets/img/Completado.png") ?>" /> Completado</span>
                            <script type="text/javascript">
                                document.getElementById("cardColor<?php echo $incidencies_item['id_incidencia'] ?>").classList.add('card-info');
                            </script>
                        <?php } ?>

                        <?php if ($incidencies_item['id_Estado'] == 4) { ?>
                            <span><img src="<?php echo base_url("assets/img/Enviado.png") ?>" /> Entregado</span>
                            <script type="text/javascript">
                                document.getElementById("cardColor<?php echo $incidencies_item['id_incidencia'] ?>").classList.add('card-success');
                            </script>
                        <?php } ?>


                        <br>
                        <hr>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $incidencies_item['id_incidencia'] ?>">
                            Detalles
                        </button>

                    </div>
                    <div class="card-footer text-muted">Fecha de entrada: <?php echo $incidencies_item['Fecha_entrada'] ?></div>
                </div>
                &nbsp;


                <div class="modal fade" id="exampleModal<?php echo $incidencies_item['id_incidencia'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><?php echo $incidencies_item['Diagnostico_prev'] ?></h5>



                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p class="card-text">
                                    UUID: <?php echo $incidencies_item['uuid'] ?>
                                </p>

                                <p class="card-text">
                                    MARCA: <?php echo $incidencies_item['Marca'] ?>
                                </p>

                                <p class="card-text">
                                    MODELO: <?php echo $incidencies_item['Modelo'] ?>
                                </p>

                                <p class="card-text">
                                    NUMERO DE SERIE: <?php echo $incidencies_item['Numero_serie'] ?>
                                </p>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script>
    function buscar() {
        var input, filter, cards, cardContainer, title, i;
        input = document.getElementById("search");
        filter = input.value.toUpperCase();
        cardContainer = document.getElementById("incidencias");
        cards = cardContainer.getElementsByClassName("card");
        for (i = 0; i < cards.length; i++) {
            title = cards[i].querySelector(".card-header");
            if (title.innerText.toUpperCase().indexOf(filter) > -1) {
                cards[i].style.display = "";
            } else {
                cards[i].style.display = "none";
            }
        }
    }
</script>