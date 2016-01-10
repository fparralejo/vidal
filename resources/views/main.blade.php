@extends('layout')


@section('principal')
            <div class="row">
                
                
                
                <?php
                for ($i = 0; $i < count($anuncios); $i++) {
                    ?>
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="{{ $anuncios[$i]['youtube_url'] }}" allowfullscreen></iframe>
                            </div>
                            <div class="caption">
                                <h4>{{ $anuncios[$i]['precio'] }} €</h4>
                                <p>{{ $anuncios[$i]['datos'] }}
                                </p>
                                <p class="botones"><a href="#" class="btn btn-primary" role="button">Detalles</a> </p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
                
                

                
<!--                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/FbktmVTW1NQ" allowfullscreen></iframe>
                        </div>
                        <div class="caption">
                            <h4>Título producto 1</h4>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida...
                            </p>
                            <p class="botones"><a href="#" class="btn btn-primary" role="button">Detalles</a> <a href="#" class="btn btn-default" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Agregar</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Ifx3buwm_xE" allowfullscreen></iframe>
                        </div>
                        <div class="caption">
                            <h4>Título producto 2 <span class="label label-danger">Sin stock</span></h4>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida...

                            <p><a href="#" class="btn btn-primary" role="button">Detalles</a> <a href="#" class="btn btn-default" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Agregar</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/u2l6nk7pMQ0" allowfullscreen></iframe>
                        </div>
                        <div class="caption">
                            <h4>Título producto 3 <span class="label label-danger">Sin stock</span></h4>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida...

                            <p><a href="#" class="btn btn-primary" role="button">Detalles</a> <a href="#" class="btn btn-default" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Agregar</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/hJhadhmJktQ" allowfullscreen></iframe>
                        </div>
                        <div class="caption">
                            <h4>Título producto 4</h4>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida...
                            <p><a href="#" class="btn btn-primary" role="button">Detalles</a> <a href="#" class="btn btn-default" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Agregar</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <span class="badge">5.99 USD</span>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/CWEDXBo5nMc" allowfullscreen></iframe>
                        </div>
                        <div class="caption">
                            <h4>Título producto 5 <span class="label label-info">En rebaja</span></h4>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida...
                            <p><a href="#" class="btn btn-primary" role="button">Detalles</a> <a href="#" class="btn btn-default" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Agregar</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <span class="badge">5.99 USD</span>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/AMnMutJBIjg" allowfullscreen></iframe>
                        </div>
                        <div class="caption">
                            <h4>Título producto 6 <span class="label label-warning">En rebaja</span></h4>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida...
                            <p><a href="#" class="btn btn-primary" role="button">Detalles</a> <a href="#" class="btn btn-default" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Agregar</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <span class="badge">39.99 USD</span>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Q_Le6AsIWrg" allowfullscreen></iframe>
                        </div>
                        <div class="caption">
                            <h4>Título producto 7 <span class="label label-success">Nuevo</span></h4>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida...
                            <p><a href="#" class="btn btn-primary" role="button">Detalles</a> <a href="#" class="btn btn-default" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Agregar</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <span class="badge">5.99 USD</span>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/O9pBJkR7DqU" allowfullscreen></iframe>
                        </div>
                        <div class="caption">
                            <h4>Título producto 8 <span class="label label-info">En rebaja</span></h4>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida...
                            <p><a href="#" class="btn btn-primary" role="button">Detalles</a> <a href="#" class="btn btn-default" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Agregar</a></p>
                        </div>
                    </div>
                </div>-->


            </div>

<!--            <nav>
                <ul class="pagination">
                    <li>
                        <a href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li>
                        <a href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>-->


@stop



