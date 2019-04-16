<section class="main-container">

    <div class="container">
        <div class="row">

            <div class="main col-lg-8">

                @if (isset($articles))

                    @include('many_articles')

                @elseif(isset($oneArticle))

                    @include('one_article')

                @endif

            </div>

            @include('sidebar.sidebar_article')

        </div>
    </div>
</section>

