<div>
    <div>
        @livewire('attachment-viewer', ['document'=> request()->id])
    </div>

    <script>
        document.querySelector("iframe").sandbox = "allow-scripts allow-forms allow-top-navigation allow-modals allow-popups allow-pointer-lock allow-geolocation allow-clipboard-read allow-clipboard-write allow-insecure-requests allow-downloads allow-same-origin: false";
    
    </script>
</div>