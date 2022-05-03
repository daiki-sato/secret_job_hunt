import React, { useState, useContext, useEffect } from "react";
import TextField from "@material-ui/core/TextField";
import { createStyles, makeStyles, Theme } from "@material-ui/core/styles";
import SendIcon from "@material-ui/icons/Send";
import Button from "@material-ui/core/Button";
import { roleIdContext } from "../Thread";

const useStyles = makeStyles((theme) =>
  createStyles({
    wrapForm: {
      display: "flex",
      justifyContent: "center",
      width: "95%",
      margin: `${theme.spacing(0)} auto`,
    },
    wrapText: {
      width: "100%",
    },
    button: {
      //margin: theme.spacing(1),
    },
  })
);
const postURL = "http://localhost/message/post";
const TextInput = ({ messages, getMessages }) => {
  const classes = useStyles();
  const [threadId, setThreadId] = useState("");
  const roleId = useContext(roleIdContext);
  const senderId = roleId;

  useEffect(() => {
    if (messages[0]) {
      setThreadId(messages[0].thread_id);
    } else {
      setThreadId(0);
    }
  }, [messages]);

  const [inputMessage, setInputMessage] = useState("");
  const handleChange = (event) => {
    setInputMessage(event.target.value);
  };

  const handleSubmit = (event) => {
    event.preventDefault();
    axios
      .post(postURL, {
        message: inputMessage,
        thread_id: threadId,
        sender_id: senderId,
      })
      .then(() => {
        setInputMessage("");
        getMessages();
      });
  };

  return (
    <>
      <form className={classes.wrapForm} noValidate autoComplete="off">
        <TextField
          id="standard-text"
          label="メッセージを入力"
          value={inputMessage}
          onChange={handleChange}
          className={classes.wrapText}
        />
        <Button
          variant="contained"
          color="primary"
          className={classes.button}
          onClick={handleSubmit}
        >
          <SendIcon />
        </Button>
      </form>
    </>
  );
};

export default TextInput;
