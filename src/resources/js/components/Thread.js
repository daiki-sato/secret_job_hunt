import React, {
  useState,
  useEffect,
  useRef,
  createRef,
  useLayoutEffect,
} from "react";
import ReactDOM from "react-dom";
import axios from "axios";
import {
  ChatList,
  MessageList,
  ChatItem,
  MeetingItem,
} from "react-chat-elements";
import { Button, Row, Col, Divider, Input, message } from "antd";
import { Box, Paper, Grid } from "@mui/material";
import { styled } from "@mui/material/styles";
const { TextArea } = Input;

import "react-chat-elements/dist/main.css";
const Item = styled(Paper)(({ theme }) => ({
  backgroundColor: theme.palette.mode === "dark" ? "#1A2027" : "#fff",
  ...theme.typography.body2,
  padding: theme.spacing(1),
  textAlign: "center",
  color: theme.palette.text.secondary,
}));

const ChatWidget = (props) => {
  const [user, setUser] = useState(props.clickUser);
  const [msgDataList, setMsgDataList] = useState([null]);
  const [sendMsg, setSendMsg] = useState("");

  useEffect(() => {
    createMessage();
  }, [props.clickUser, props.messages]);

  const createMessage = () => {
    setUser(props.clickUser);
    let list = [];
    const messages = props.messages[0].messages;
    messages.map((message) => {
      list.push({
        position: message.sender_id == 2 ? "right" : "left",
        type: "text",
        text: message.message,
        status: "read",
        date: new Date(),
      });
    });
    setMsgDataList(list);
  };

  const clickButton = () => {
    const threadId = props.messages[0].messages[0].thread_id;
    const postURL = "http://localhost/message/post";
    axios
      .post(postURL, {
        message: sendMsg,
        thread_id: threadId,
        sender_id: props.roleId,
      })
      .then(() => {
        setSendMsg("");
        createMessage();
      });
  };

  return (
    <Col
      style={{
        width: 700,
        height: 600,
        display: "inline-block",
        borderRight: "3px solid",
        borderTop: "3px solid",
        borderBottom: "3px solid",
      }}
    >
      <Row>
        <Col
          style={{
            width: 700,
            height: 40,
            textAlign: "left",
            verticalAlign: "middle",
            fontSize: 20,
          }}
        >
          {user == null ? "" : user.title}
        </Col>
      </Row>
      <Row>
        <div
          style={{
            width: 700,
            height: 420,
            textAlign: "center",
            verticalAlign: "middle",
            fontSize: 20,
            overflow: "auto",
            backgroundColor: "\t#C0C0C0",
          }}
        >
          <MessageList className="message-list" dataSource={msgDataList} />
        </div>
      </Row>

      <Row>
        <Col
          style={{
            width: 700,
            textAlign: "center",
            verticalAlign: "middle",
            fontSize: 20,
          }}
        >
          <TextArea
            rows={4}
            onChange={(e) => {
              setSendMsg(e.target.value);
            }}
            value={sendMsg}
            placeholder="メッセージを入力"
          />
          <Button type="primary" onClick={clickButton}>
            发送
          </Button>
        </Col>
      </Row>
    </Col>
  );
};

const ChatPage = () => {
  const targetDom = document.getElementById("thread");
  const userId = targetDom.dataset.userId;
  const roleId = targetDom.dataset.roleId;

  const [threadUsers, setThreadUsers] = useState([]);
  const [userList, setUserList] = useState([]);
  const [clickUser, setClickUser] = useState({});
  const [nicknames, setNicknames] = useState({});

  const getThreadUser = () => {
    const getURL = `http://localhost/api/getThreadUser/${userId}/${roleId}`;
    axios
      .get(getURL)
      .then((response) => {
        setThreadUsers(response.data);
      })
      .catch((error) => console.log(error));
  };

  const getNickname = () => {
    const getURL = `http://localhost/api/getNickname/${userId}/${roleId}`;
    axios
      .get(getURL)
      .then((response) => {
        setNicknames(response.data);
      })
      .catch((error) => console.log(error));
  };

  const createUserList = () => {
    let list = [];
    threadUsers.map((threadUser, index) => {
      list.push({
        avatar:
          "https://zos.alipayobjects.com/rmsportal/ODTLcjxAfvqbxHnVXCYX.png",
        alt: "Reactjs",
        title: nicknames[index],
        solverId: threadUser.solver_id,
        subtitle: "What are you doing?",
        date: new Date(),
        unread: Math.floor(Math.random() * 10),
      });
    });
    setUserList(list);
    setClickUser(list[0]);
  };

  useEffect(() => {
    getThreadUser();
    getNickname();
  }, []);

  useEffect(() => {
    createUserList();
  }, [threadUsers, nicknames]);

  return (
    <>
      <div>
        <Divider
          orientation="left"
          style={{
            color: "#333",
            fontWeight: "normal",
          }}
        >
          私信列表
        </Divider>
        <Row>
          <Col
            style={{
              width: 400,
              height: 600,
              display: "inline-block",
              border: "3px solid",
              overflow: "auto",
            }}
          >
            <ChatList
              // showVideoCall={true}
              className="chat-list"
              onClick={(e) => setClickUser(e)}
              dataSource={userList}
            />
          </Col>
          {userList.length == 0 ? (
            <div>ないよー</div>
          ) : (
            <ChatWidget
              clickUser={clickUser}
              messages={threadUsers.filter((threadUser) => {
                return threadUser.solver_id == clickUser.solverId;
              })}
              roleId={roleId}
              getThreadUser={() => getThreadUser()}
            />
          )}
        </Row>
      </div>
    </>
  );
};
export default ChatPage;
if (document.getElementById("thread")) {
  ReactDOM.render(<ChatPage />, document.getElementById("thread"));
}
