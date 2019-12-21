<template>

        <div class="container pt-2">
            <div class="row">
                <div class="col-md-6">
                    <div class="card text-center">
                        <div class="card-header">Hommes</div>
                        <div id="carousel" class="carousel slide carousel-fade w-100"
                             data-interval="3000" data-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active">
                                    <img class="w-100 img-fluid"
                                         src="../../images/t-shirt-03.jpeg"
                                         alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100 img-fluid"
                                         src="../../images/t-shirt-04.jpeg"
                                         alt="Second slide"/>
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100 img-fluid"
                                         src="../../images/t-shirt-06.jpeg"
                                         alt="Third slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"/>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"/>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card text-center">
                        <div class="card-header">Femmes</div>
                        <div id="carousel2" class="carousel slide carousel-fade w-75"
                             data-interval="2500" data-ride="carousel">
                            <!--Slides-->
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active">
                                    <img class="w-100 img-fluid"
                                         src="../../images/t-shirt-07.jpeg"
                                         alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100 img-fluid"
                                         src="../../images/t-shirt-08.jpeg"
                                         alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100 img-fluid"
                                         src="../../images/t-shirt-05.jpeg"
                                         alt="Third slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"/>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"/>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</template>
<script>
    export default {
        name: "CarouselComponent",
        components: {},
        data() {
            return {

            };
        },
        mounted() {},
        methods: {}
    };
</script>
<style>
    img:hover{
        opacity: 0.7;
    }
</style>