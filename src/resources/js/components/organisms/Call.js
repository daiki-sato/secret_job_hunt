"use strict";

import ReactDOM from "react-dom";
import React, { useState, useRef, useEffect } from "react";
import Peer, { MediaConnection } from "skyway-js";

const peer = new Peer({
  key: "16bd82f6-6e7d-47ec-84a7-7a666f2b1da9",
  debug: 3,
});

const Call = (props) => {
  let localStream; //このファイル内のグローバル変数

  //音声、カメラの取得
  navigator.mediaDevices
    .getUserMedia({ video: true, audio: true })
    .then((stream) => {
      const videoElm = document.getElementById("my-video");
      videoElm.srcObject = stream;
      videoElm.play();
      localStream = stream;
    })
    .catch((error) => {
      console.error("mediaDevice.getUserMedia() error:", error);
      return;
    });
  const handleCall = () => {
    const targetDom = document.getElementById("call");
    const callRoomId = "targetDom.dataset.callRoomId";
    const mediaConnection = peer.joinRoom(callRoomId, {
      mode: "sfu",
      stream: localStream,
    });
    setEventListener(mediaConnection);
  };

  // イベントリスナを設置する関数
  const setEventListener = (mediaConnection) => {
    const leaveTrigger = document.getElementById("leave-trigger");
    const messages = document.getElementById("messages");
    const remoteVideos = document.getElementById("remote-streams");

    mediaConnection.once("open", () => {
      messages.textContent += "=== meetingに参加しました ===\n";
    });

    mediaConnection.on("peerJoin", (peerId) => {
      messages.textContent += `=== ${peerId} が参加しました ===\n`;
    });

    mediaConnection.on("stream", (stream) => {
      const newVideo = document.createElement("video");
      newVideo.srcObject = stream;
      newVideo.playsInline = true;
      newVideo.setAttribute("data-peer-id", stream.peerId);
      remoteVideos.append(newVideo);
      newVideo.play();
    });

    // for closing room members
    mediaConnection.on("peerLeave", (peerId) => {
      const remoteVideo = remoteVideos.querySelector(
        `[data-peer-id="${peerId}"]`
      );
      remoteVideo.srcObject.getTracks().forEach((track) => track.stop());
      remoteVideo.srcObject = null;
      remoteVideo.remove();

      messages.textContent += `=== ${peerId} が退室しました ===\n`;
    });

    // for closing myself
    mediaConnection.once("close", () => {
      // sendTrigger.removeEventListener('click', onClickSend);
      messages.textContent += "== meetingから退室しました ===\n";
      Array.from(remoteVideos.children).forEach((remoteVideo) => {
        remoteVideo.srcObject.getTracks().forEach((track) => track.stop());
        remoteVideo.srcObject = null;
        remoteVideo.remove();
      });
    });

    leaveTrigger.addEventListener("click", () => mediaConnection.close(), {
      once: true,
    });
  };

  return (
    <div>
      <div>
        <pre className="messages" id="messages"></pre>
        <button id="make-call" onClick={handleCall}>
          meeting参加
        </button>
        <button id="leave-trigger">退室</button>
      </div>
      <video width="400px" autoPlay muted playsInline id="my-video"></video>
      <div className="remote-streams" id="remote-streams"></div>
    </div>
  );
};

export default Call;
if (document.getElementById("call")) {
  ReactDOM.render(<Call />, document.getElementById("call"));
}
