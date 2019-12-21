<template>
    <div class="contentAll">
        <MainHeader/>
        <div class="bgimg">
            <section>
                <div class="container text-center pt-5">
                    <div class="card p-3">
                        <h4 class="pb-3">Nos meilleures ventes</h4>
                        <p>Something short and leading about the collection below—its contents, the creator, etc. Make
                            it short and sweet, but not too short so folks don’t simply skip over it entirely
                        </p>
                        <p><a class="btn btn-success text-white" href="/product">Consulter</a></p>
                    </div>
                </div>
            </section>
            <Carousel/>
            <section>
                <div class="container text-center pt-5">
                    <div class="card p-3">
                        <h4 class="pb-3">Promotions du moments</h4>
                        <p>Something short and leading about the collection below—its contents, the creator, etc. Make
                            it short and sweet, but not too short so folks don’t simply skip over it entirely
                        </p>
                    </div>
                </div>
            </section>

            <div class="container">
                <div class="card bg-light py-2 text-center">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <a href="#"><img src="../../images/t-shirt-03.jpeg" class="card-img-top img-thumbnail" alt=""></a>
                            </div>
                            <div class="col">
                                <a href="#"><img src="../../images/t-shirt-07.jpeg" class="card-img-top img-thumbnail" alt=""></a>
                            </div>
                            <div class="col">
                                <a href="#"><img src="../../images/t-shirt-06.jpeg" class="card-img-top img-thumbnail" alt=""></a>
                            </div>
                        </div>
                        <p class="text-secondary m-0 pt-5">Un Tshirt est passe partout, qu'on peut mettre avec un
                            jogging
                            pour faire son sport, mais aussi en dessous d'une veste tailleur pour un look plus classe,
                            ou chez soi pour glander devant Netflix ! C'est un must have dans chaque garde robe !
                            L'envoi est toujours gratuit à partir de 2 articles, quels qu'ils soient!</p>
                        <p class="text-black"></p>
                        <p class="text-black">30 jours pour effectuer un échange gratuit ou un remboursement</p>
                        <p><a class="btn btn-success text-white" href="/product">En profiter !</a></p>
                    </div>
                </div>
            </div>
            <!--       Cards of first section-->
            <div class="container py-5">
                <div class="card-deck text-center">
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-normal">Promo Hiver</h4>
                            </div>
                            <div class="card-body">
                                <img src="../../images/promo01.jpg" class="img-fluid max-width: 100%;" alt="">
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>Que vous soyez à la recherche d'un Tshirt qui soit original et en même temps
                                        classique, chez Webshop vous pouvez le personnaliser, envoyez-nous votre idée et
                                        on s'occupe du reste !
                                    </li>
                                </ul>
                                <a href="/product" type="button" class="btn btn-lg btn-block btn-info">Découvrir</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-normal">Promo Spéciales</h4>
                            </div>
                            <div class="card-body">
                                <img src="../../images/promo02.jpg" class="img-fluid max-width: 100%;" alt="">
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>A la recherche d'une idée pour un Tee shirt femme à manche courte ou à manche
                                        longue, original, unique, décalé et pas cher ! Une sélection de Tshirt est
                                        chaque jour revue et publiée chez Webshop
                                    </li>
                                </ul>
                                <a href="/product" type="button" class="btn btn-lg btn-block btn-info">Participer</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--         Section with BackGround -->
            <div class="bg">
                <section>
                    <!-- Cards of the section -->
                    <HomeCard/>
                </section>
            </div>
        </div>
        <section>
            <div class="container">
                <div class="container p-5 text-center">
                    <h4 class="font-weight-dark">Créer son compte Webshop et bénéficier de nombreux avantages !</h4>
                    <p class="text-muted p-3">This is a template that is great for small businesses. It doesn't have too
                        much fancy flare
                        to it, but it makes a great use of the
                        standard Bootstrap core components. Feel free to use this template for any project you
                        want!</p>
                    <a class="btn btn-success mb-2 text-white" href="/register">Se créer un compte</a>
                </div>
            </div>
        </section>
    </div>
</template>
<script>
import Carousel from "../components/CarouselComponent.vue";
import HomeCard from "../components/HomeCardComponent.vue";
import MainHeader from "../components/MainHeaderComponent.vue";
    export default {
        name: "Home",
        components: {Carousel,MainHeader,HomeCard},
        props: {},
        data: () => ({}),

        methods: {
            agency: function () {
                window.location.href = '/product'
            },
            devhome: function () {
                window.location.href = '/list'
            },
            blog: function () {
                window.location.href = '/login'
            }
        }
    };
</script>
<style scoped>
    .contentAll {
        margin-top: 50px;
    }

    li {
        list-style: none;
        font-size: 13px;
    }

    a {
        text-decoration: none;
        color: #4c5367;
    }

    a:hover {
        color: #33a489;
    }

    .contentSection {

        background: linear-gradient(to bottom, rgba(48, 147, 226, 0.98) 0%, rgba(175, 172, 176, 0.9) 100%) no-repeat scroll center;
    }

    .bg {
        opacity: 0.9;
        background-image: url('../../images/background10.jpg');
        background-attachment: fixed;
        background-position: center;
        /*background-repeat: no-repeat;*/
        /*background-size: cover;*/
    }

    .bgimg {
        background-image: url('../../images/background6.jpg');
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;

    }
img:hover{
   opacity: 0.7;
}

</style>
