import React from "react";
import ReactDOM from "react-dom";
import axios from "axios";
import MessageBox from "../molecules/MessageBox";
const getURL = "http://localhost/message/get";
const postURL = "http://localhost/message/post";

const Message = () => {
  const { useState, useEffect } = React;
  const [getMessages, setGetMessages] = useState([]);
  const [inputMessage, setInputMessage] = useState("");

  useEffect(() => {
    getData();
  }, []);

  const handleChange = (e) => {
    setInputMessage(e.target.value);
  };

  const getData = () => {
    axios
      .get(getURL)
      .then((response) => setGetMessages(response.data))
      .catch((error) => console.log(error));
  };

  const createPost = () => {
    axios
      .post(postURL, {
        message: inputMessage,
        thread_id: 1,
        sender_id: 2,
      })
      .then((response) => {
        response.data;
        setInputMessage("");
        getData();
      });
  };

  return (
    <div className="container">
      <div id="chat" className="message">
        <div className="wrapper">
          <div className="message_area">
            {getMessages.map((message, index) => (
              <MessageBox message={message} key={index} />
            ))}
          </div>
          <textarea value={inputMessage} onChange={handleChange}></textarea>
          <p>{inputMessage}</p>
          <button onClick={createPost}>Create Post</button>
        </div>
      </div>
    </div>
  );
};

export default Message;

if (document.getElementById("message")) {
  ReactDOM.render(<Message />, document.getElementById("message"));
}
