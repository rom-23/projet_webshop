<template>
    <div class="contentAll">
        <header class="masthead">
            <div class="container pt-5">
                <div class="row align-items-center justify-content-center text-center">
                    <div class="col-10 align-self-end">
                        <h1 class="text-uppercase text-white font-weight-bold">Your Favorite shop for all the year, download a theme and start customizing</h1>
                    </div>
                    <div class="col-8 align-self-baseline">
                        <p class="mb-5">Start Bootstrap can help you build better websites
                            using the Bootstrap framework! Just download a theme and start customizing, no strings
                            attached!</p>
                        <a class="btn btn-primary" href="/product">Enter the shop</a>
                    </div>
                </div>
                <section>
                    <div class="container p-5">
                        <div class="row justify-content-center">
                            <div class="col-8 text-center">
                                <h2 class="mt-0 text-black">Let's Get In Touch!</h2>
                                <p class="mb-5 text-black">Ready to start your n to start your n to start your n ext projec to start your n t with us? Give us a
                                    call or send us an email and we will get back to you as soon as possible!</p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </header>
        <div class="bgimg">
            <!--        First section-->
            <section>
                <div class="container text-center pt-5">
                    <h1>Album example</h1>
                    <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and
                        sweet, but not too short so folks don’t simply skip over it entirely
                    </p>
                    <p>
                        <a href="#" class="btn btn-info my-2">Main call to action</a>
                        <a href="#" class="btn btn-info my-2">Secondary action</a>
                    </p>
                </div>
            </section>
            <!--       Cards of first section-->
            <div class="container py-5">
                <div class="card-deck text-center">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-normal">Promo Hiver</h4>
                            </div>
                            <div class="card-body">
                                <img src="../../images/promo01.jpg" class="card-img-top img-thumbnail" alt="">
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>20 users included</li>
                                    <li>10 GB of storage</li>
                                    <li>Priority email support</li>
                                    <li>Help center access</li>
                                </ul>
                                <button type="button" class="btn btn-lg btn-block btn-primary">Get started</button>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-normal">Promo Spéciales</h4>
                            </div>
                            <div class="card-body">
                                <img src="../../images/promo02.jpg" class="img-thumbnail card-img-top" alt="">
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>20 users included</li>
                                    <li>10 GB of storage</li>
                                    <li>Priority email support</li>
                                    <li>Help center access</li>
                                </ul>
                                <button type="button" class="btn btn-lg btn-block btn-primary">Get started</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--         Section with BackGround -->
            <div class="bg">
                <section>
                    <div class="container pt-5 text-center">
                        <h1 class="font-weight-light">Business Name or Tagline</h1>
                        <p>This is a template that is great for small businesses. It doesn't have too much fancy flare to it, but it makes a great use of the
                            standard Bootstrap core components. Feel free to use this template for any project you want!</p>
                        <a class="btn btn-danger" href="#">Call to Action!</a>
                    </div>
                    <div class="container pt-5">
                        <div class="card text-white bg-secondary py-4 text-center">
                            <div class="card-body">
                                <p class="text-white m-0">This call to action card is a great place to showcase
                                    some important information or display a clever tagline!</p>
                            </div>
                        </div>
                    </div>
                    <!-- Cards of the section -->
                    <div class="container p-5">
                        <div class="card-deck text-center">
                            <div class="col">
                                <div class="card h-100">
                                    <img src="../../images/tshirt01.jpg" class="card-img-top" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card h-100">
                                    <img src="../../images/tshirt02.jpg" class="card-img-top" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card h-100">
                                    <img src="../../images/tshirt03.jpg" class="card-img-top" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!--        Last section-->
            <section>
                <div class="contentSection py-5">
                    <div class="row justify-content-center">
                        <div class="col-8 text-center py-5">
                            <h2 class="text-white">We've got what you need!</h2>
                            <p class="text-white-50">Start Bootstrap has everything you need to get your new website up and
                                running in no time! Choose one of our open source, free to download, and easy to use themes! No
                                strings attached!</p>
                            <button class="btn btn-light" @click="agency()">Get Started!</button>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <footer class="bg-light py-5">
            <div class="container">
                <div class="small text-center text-muted">Copyright &copy; 2019 - Webshop_Rom1</div>
            </div>
        </footer>
    </div>
</template>
<script>

    export default {
        name: "Home",
        components: {},
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

    header.masthead {
        background: linear-gradient(to bottom, rgba(16, 46, 128, 0.85) 0%, rgba(83, 168, 175, 0.65) 100%) no-repeat scroll center;
    }
</style>
