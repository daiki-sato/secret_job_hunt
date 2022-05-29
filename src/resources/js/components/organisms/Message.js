import React, { useState, useEffect } from "react";
import MessageBox from "../molecules/MessageBox";
import TextInput from "../molecules/TextInput";
import Call from "./Call";

const Message = ({ currentThreadId }) => {
  const threadId = currentThreadId;

  const [messages, setMessages] = useState([]);
  const getURL = `http://localhost/message/get/${threadId}`;
  const getMessages = () => {
    axios
      .get(getURL)
      .then((response) => {
        setMessages(response.data);
      })
      .catch((error) => console.log(error));
  };

  const [callRoomId, setCallRoomId] = useState("");
  const getCallRoomId = () => {
    axios
      .get(`http://localhost/api/callRoomId/${threadId}`)
      .then((response) => {
        setCallRoomId(response.data);
      })
      .catch((error) => console.log(error));
  };

  useEffect(() => {
    getMessages();
    getCallRoomId();
  }, [currentThreadId]);

  return (
    <>
      {messages.map((message) => {
        return (
          <MessageBox
            key={message.id}
            message={message}
            getMessages={getMessages}
          />
        );
      })}
      <Call callRoomId={callRoomId} />
      <TextInput messages={messages} getMessages={getMessages} />
    </>
  );
};

export default Message;
