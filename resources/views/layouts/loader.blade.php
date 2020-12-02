<style>
    #loader{
        background:#6610f2;
        height:100vh;
        width:100vw;
        position:fixed;
        top:0px;
        left:0px;
        z-index:9999;
        transition:all 500ms;
        display:flex;
        justify-content:center;
        align-items:center;
    }
    #spinner {
        width:50px;
        height:50px;
        border:0.25em solid white;
        border-radius:50%;
        border-top:0.25em solid transparent;
        border-bottom:0.25em solid transparent;
        animation:rot 1s infinite;
    }
    @keyframes rot {
        to { transform:rotate(360deg)}
    }
</style>
<div id="loader">
    <div id="spinner"></div>
</div>
<script>
    window.onload = function(){
        document.getElementById('loader').style='display:none';
    }
</script>