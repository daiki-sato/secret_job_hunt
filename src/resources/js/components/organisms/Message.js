import React, { useState, useEffect } from "react";
import MessageBox from "../molecules/MessageBox";
import TextInput from "../molecules/TextInput";

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

  useEffect(() => {
    getMessages();
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
      <TextInput messages={messages} getMessages={getMessages} />
    </>
  );
};

export default Message;
