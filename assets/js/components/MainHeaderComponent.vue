<template>
            <header class="masthead">
            <div class="container pt-5">
                <div class="row align-items-center justify-content-center text-center">
                    <div class="col-10 align-self-end">
                        <h3 class="text-uppercase text-white font-weight-bold">TEE-SHIRTS ORIGINAUX : SOYEZ UNIQUES!
                            DESIGNS ORIGINAUX POUR TOUTES LES OCCASIONS!</h3>
                    </div>
                    <div class="col-8 align-self-baseline">
                        <p class="mb-5 pt-3">Marre de toujours mettre le même modéle de Tshirt, même couleurs, même
                            motifs et designs partout !
                            Webshop vous propose une infinie d'idée de designs dans son catalogue, aussi la possibilité
                            de personnaliser vous même votre T-shirt, grâce à notre super équipe réactive et
                            professionelle ! </p>
                        <a class="btn btn-success text-white" href="/product">Visiter la boutique</a>
                    </div>
                </div>
                <section>
                    <div class="container p-5">
                        <div class="row justify-content-center">
                            <div class="col-8 text-center">
                                <p class="mt-0 text-dark">Recevez votre article en 48 heures avec la livraison
                                    express</p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </header>
</template>
<script>

    export default {
        name: "MainHeaderComponent",
        components: {},
        props: {},
        data: () => ({}),

        methods: {

        }
    };
</script>
<style scoped>

    header.masthead {
        background-image: url('../../images/background02.jpg');
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        /*background: linear-gradient(to bottom, rgba(16, 46, 128, 0.85) 0%, rgba(83, 168, 175, 0.65) 100%) no-repeat scroll center;*/
    }

</style>
