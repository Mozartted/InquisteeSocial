<style>
    .tabs .indicator {
        position: none;
        bottom: 0;
        height: 0px;
        background-color: #f6b2b5;
        will-change: left, right;
    }

    .tabs {
        position: relative;
        overflow-x: auto;
        overflow-y: hidden;
        height: auto;
        width: 100%;
        background-color: #fff;
        margin: 0 auto;
        white-space: nowrap;
    }

    @media only screen and (max-width: 992px){
        .tabs {
            display: block;
        }
    }


    .tabs a.active{
        display: block;
        border-left: #ed1c34 solid 2px;
    }

    .tabs .tab {
        display: flex;
        text-align: center;
        line-height: 48px;
        height: 48px;
        padding: 0;
        margin: 0;
        width: 100%;
        text-transform: uppercase;
    }


    </style>
