<style>
    /* (A) FORCE SLIDES INTO SINGLE ROW */
    .hmove {
        display: flex;
    }

    .hslide {
        width: 100%;
        flex-shrink: 0;
    }

    /* (B) OUTER WRAPPER HIDE SCROLLBAR */
    .hwrap {
        display: none;
        overflow: hidden;
        margin-top: 2em;
    }

    /* (C) SHIFT SLIDES WITH CSS ANIMATION */
    /* (C1) SLIDES POSITION */
    .hmove {
        position: relative;
        top: 0;
        right: 0;
    }

    .pc-view {
        margin-top: 2em;
    }

    .pc-view p,
    .hslide p {
        font-size: 1.6em;
        font-family: 'Forsythe-Normal', sans-serif;
        margin-bottom: 1.5em;
    }

    @keyframes slideh {
        0% {
            right: 0;
        }

        48% {
            right: 0;
        }

        51% {
            right: 100%;
        }

        97% {
            right: 100%;
        }

        100% {
            right: 0;
        }
    }

    /* (C2) MOVE SLIDES */
    .hmove {
        animation: slideh linear 20s infinite;
    }

    .hmove:hover {
        animation-play-state: paused;
    }

    @media (max-width: 768px) {
        .hwrap {
            display: block;
        }

        .pc-view {
            display: none;
        }

        .hslide p {
            font-size: 1.2em;
        }
    }

    @media (min-width: 1600px) {
        .pc-view p {
            margin-top: 2em;
            font-size: 2em;
        }
    }
</style>

<div class="hwrap">
    <div class="hmove">
        <div class="hslide">
            <p>
                If you're on the hunt for custom-made hip-hop beats that scream originality and vibe, then
                you've come to the right place.<br /> <br /> From the hard-hitting boom-bap to the smooth
                and soulful
                melodies, I've got the range to cater to your unique style and vision.
            </p>
        </div>
        <div class="hslide">

            <p>
                Whether you're an aspiring rapper looking for that perfect backdrop for your lyrical flow, a
                filmmaker in need of a killer soundtrack, or a content creator searching for the perfect
                beat to
                set the mood for your videos, I've got you covered.
            </p>
        </div>
    </div>
</div>

<div class="pc-view">
    <p>
        If you're on the hunt for custom-made hip-hop beats that scream originality and vibe, then
        you've come to the right place.<br /> <br /> From the hard-hitting boom-bap to the smooth
        and soulful
        melodies, I've got the range to cater to your unique style and vision.
    </p>
    <p>
        Whether you're an aspiring rapper looking for that perfect backdrop for your lyrical flow, a
        filmmaker in need of a killer soundtrack, or a content creator searching for the perfect
        beat to
        set the mood for your videos, I've got you covered.
    </p>
</div>


<script></script>
