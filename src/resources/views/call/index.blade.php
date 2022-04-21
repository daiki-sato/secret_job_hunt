{{-- @extends('layouts.app')
@section('content')
    <button>通話を開始する</button>
@endsection --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SkyWay - P2P Media example</title>
    <link rel="stylesheet" href="../_shared/style.css">
</head>

<body>
    <div class="container">
        <h1 class="heading">P2P Media example</h1>
        <p class="note">
            Enter remote peer ID to call.
        </p>
        <div class="p2p-media">
            <div class="remote-stream">
                <video id="js-remote-stream"></video>
            </div>
            <div class="local-stream">
                <video id="js-local-stream"></video>
                <p>Your ID: <span id="js-local-id"></span></p>
                <input type="text" placeholder="Remote Peer ID" id="js-remote-id">
                <button id="js-call-trigger">Call</button>
                <button id="js-close-trigger">Close</button>
            </div>
        </div>
        <p class="meta" id="js-meta"></p>
    </div>

    <video id="my-video" width="400px" autoplay muted playsinline></video>
    <p id="my-id"></p>
    <input id="their-id" type="text"></input>
    <button id="make-call">発信</button>
    <video id="their-video" width="400px" autoplay muted playsinline></video>


    <script src="//cdn.webrtc.ecl.ntt.com/skyway-4.4.4.js"></script>
    <script src="../_shared/key.js"></script>
    {{-- <script src="/js/call.js"></script> --}}
    {{-- <script src="../../../public/js/call.js"></script> --}}


    <script>
        let localStream;

        // カメラ映像取得
        navigator.mediaDevices.getUserMedia({
                video: true,
                audio: true
            })
            .then(stream => {
                // 成功時にvideo要素にカメラ映像をセットし、再生
                const videoElm = document.getElementById('my-video');
                videoElm.srcObject = stream;
                videoElm.play();
                // 着信時に相手にカメラ映像を返せるように、グローバル変数に保存しておく
                localStream = stream;
            }).catch(error => {
                // 失敗時にはエラーログを出力
                console.error('mediaDevice.getUserMedia() error:', error);
                return;
            });

        //Peer作成
        const peer = new Peer({
            key: '16bd82f6-6e7d-47ec-84a7-7a666f2b1da9',
            debug: 3
        });

        //PeerID取得
        peer.on('open', () => {
            document.getElementById('my-id').textContent = peer.id;
        });

        // 発信処理
        document.getElementById('make-call').onclick = () => {
            const theirID = document.getElementById('their-id').value;
            const mediaConnection = peer.call(theirID, localStream);
            setEventListener(mediaConnection);
        };

        // イベントリスナを設置する関数
        const setEventListener = mediaConnection => {
            mediaConnection.on('stream', stream => {
                // video要素にカメラ映像をセットして再生
                const videoElm = document.getElementById('their-video')
                videoElm.srcObject = stream;
                videoElm.play();
            });
        }

        //着信処理
        peer.on('call', mediaConnection => {
            mediaConnection.answer(localStream);
            setEventListener(mediaConnection);
        });

        peer.on('error', err => {
            alert(err.message);
        });

        peer.on('close', () => {
            alert('通信が切断しました。');
        });
    </script>

    <script>
        console.log(1);
        const Peer = window.Peer;

        (async function main() {
            const localVideo = document.getElementById('js-local-stream');
            const localId = document.getElementById('js-local-id');
            const callTrigger = document.getElementById('js-call-trigger');
            const closeTrigger = document.getElementById('js-close-trigger');
            const remoteVideo = document.getElementById('js-remote-stream');
            const remoteId = document.getElementById('js-remote-id');
            const meta = document.getElementById('js-meta');
            const sdkSrc = document.querySelector('script[src*=skyway]');

            meta.innerText = `
    UA: ${navigator.userAgent}
    SDK: ${sdkSrc ? sdkSrc.src : 'unknown'}
  `.trim();

            const localStream = await navigator.mediaDevices
                .getUserMedia({
                    audio: true,
                    video: true,
                })
                .catch(console.error);

            // Render local stream
            localVideo.muted = true;
            localVideo.srcObject = localStream;
            localVideo.playsInline = true;
            await localVideo.play().catch(console.error);

            // const peer = (window.peer = new Peer({
            //     key: window.__SKYWAY_KEY__,
            //     debug: 3,
            // }));
            const peer = new Peer({
                key: '16bd82f6-6e7d-47ec-84a7-7a666f2b1da9',
                debug: 3
            });

            // Register caller handler
            callTrigger.addEventListener('click', () => {
                // Note that you need to ensure the peer has connected to signaling server
                // before using methods of peer instance.
                if (!peer.open) {
                    return;
                }

                const mediaConnection = peer.call(remoteId.value, localStream);

                mediaConnection.on('stream', async stream => {
                    // Render remote stream for caller
                    remoteVideo.srcObject = stream;
                    remoteVideo.playsInline = true;
                    await remoteVideo.play().catch(console.error);
                });

                mediaConnection.once('close', () => {
                    remoteVideo.srcObject.getTracks().forEach(track => track.stop());
                    remoteVideo.srcObject = null;
                });

                closeTrigger.addEventListener('click', () => mediaConnection.close(true));
            });

            peer.once('open', id => (localId.textContent = id));

            // Register callee handler
            peer.on('call', mediaConnection => {
                mediaConnection.answer(localStream);

                mediaConnection.on('stream', async stream => {
                    // Render remote stream for callee
                    remoteVideo.srcObject = stream;
                    remoteVideo.playsInline = true;
                    await remoteVideo.play().catch(console.error);
                });

                mediaConnection.once('close', () => {
                    remoteVideo.srcObject.getTracks().forEach(track => track.stop());
                    remoteVideo.srcObject = null;
                });

                closeTrigger.addEventListener('click', () => mediaConnection.close(true));
            });

            peer.on('error', console.error);

            peer.on('error', err => {
                alert(err.message);
            });

            peer.on('close', () => {
                alert('通信が切断しました。');
            });
        })();
    </script>
</body>

</html>
