<?php $render('header'); ?>

<div class="container">

    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-4">      
    
            <form method="POST" action="/todo" class="form-inline mb-3">
                <div class="form-group mt-2 mb-2 col-md-9">
                    <input type="text" class="form-control w-100" id="tarefa" placeholder="Descrição da tarefa" name="tarefa" autofocus>
                    
                </div>
                <div class="form-grou col-md-3">
                    <button type="submit" class="btn btn-primary ">Enviar</button>
                </div>              
            </form>

            <table class="table">
                <tbody data-spy="scroll" class="scrollspy-example">
                    <?php foreach ($data as $tarefa) { ?>
                        <tr>
                            <th scope="row"><?= $tarefa['id'] ?></th>
                            <td><?= $tarefa['tarefa'] ?></td>
                            <td>
                                <a href="/todo/excluir/<?= $tarefa['id'] ?>">&#10003;</a>
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>

        </div>
    </div>
</div>

<?php $render('footer'); ?>