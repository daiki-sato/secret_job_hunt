import React, { useState, useEffect } from "react";
import ReactDOM from "react-dom";
import axios from "axios";
import { ChatList, MessageList } from "react-chat-elements";
import { Box, Paper, Grid, Link, TextField, Button } from "@mui/material";
import SendIcon from "@mui/icons-material/Send";
import CallIcon from "@mui/icons-material/Call";
import { styled } from "@mui/material/styles";

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
  const [callRoomId, setCallRoomId] = useState("");

  const getCallRoomId = () => {
    const threadId = props.messages[0].messages[0].thread_id;
    axios
      .get(`http://localhost/api/callRoomId/${threadId}`)
      .then((response) => {
        setCallRoomId(response.data);
      })
      .catch((error) => console.log(error));
  };

  useEffect(() => {
    createMessage();
    getCallRoomId();
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
        props.getThreadUser();
      });
  };

  return (
    <>
      <Grid item xs={12}>
        <Item sx={{ border: 1, p: 2, fontWeight: "bold" }}>
          <Box>
            {user == null ? "" : user.title}
            <Link
              href={`/call/${callRoomId}`}
              target="_blank"
              rel="noopener noreferrer"
              color="inherit"
            >
              <CallIcon color="primary"></CallIcon>
            </Link>
          </Box>
        </Item>
      </Grid>

      <Grid item xs={12}>
        <Item sx={{ border: 1 }}>
          <Box sx={{ p: 4 }}>
            <MessageList className="message-list" dataSource={msgDataList} />
          </Box>
          <Box
            sx={{
              mt: 5,
              width: 1,
              maxWidth: "100%",
              display: "flex",
              p: 4,
            }}
          >
            <TextField
              fullWidth
              id="standard-basic"
              label="メッセージを入力"
              variant="standard"
              onChange={(e) => {
                setSendMsg(e.target.value);
              }}
              value={sendMsg}
            />
            <Box
              sx={{
                width: 200,
                maxWidth: "100%",
              }}
            >
              <Button
                variant="contained"
                endIcon={<SendIcon />}
                onClick={clickButton}
              >
                送信
              </Button>
            </Box>
          </Box>
        </Item>
      </Grid>
    </>
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
    <Box sx={{ flexGrow: 1 }}>
      <Grid container>
        <Grid item xs={3} sx={{ border: 1 }}>
          <ChatList
            className="chat-list"
            onClick={(e) => setClickUser(e)}
            dataSource={userList}
          />
        </Grid>
        <Grid item xs={9}>
          {userList.length == 0 ? (
            <div>チャット相手がいません。</div>
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
        </Grid>
      </Grid>
    </Box>
  );
};
export default ChatPage;
if (document.getElementById("thread")) {
  ReactDOM.render(<ChatPage />, document.getElementById("thread"));
}
