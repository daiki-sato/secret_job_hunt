import React, { useState, useContext } from "react";
import Grid from "@material-ui/core/Grid";

import { makeStyles, createStyles, Theme } from "@material-ui/core/styles";
import Paper from "@material-ui/core/Paper";

const useStyles = makeStyles((theme) =>
  createStyles({
    root: {
      flexGrow: 1,
    },
    intervieweeMessage: {
      padding: theme.spacing(2),
      textAlign: "left",
      color: theme.palette.error.dark,
      margin: theme.spacing(2),
    },
    solverMessage: {
      padding: theme.spacing(2),
      textAlign: "left",
      color: theme.palette.primary.dark,
      margin: theme.spacing(2),
    },
  })
);

const MessageBox = ({ message, getMessages }) => {
  const classes = useStyles();
  const intervieweeMessage = 2;
  const senderId = message.sender_id;
  const handleDelete = (event) => {
    if (!window.confirm("メッセージを取り消してもよろしいですか？")) {
      return false;
    }
    const messageId = message.id;
    const deleteURL = `http://localhost/message/delete/${messageId}`;
    axios
      .post(deleteURL)
      .then(() => {
        getMessages();
      })
      .catch(function(error) {
        console.log(error);
      });
  };

  return (
    <>
      <Grid
        container
        direction="row"
        alignItems="center"
        justifyContent={
          senderId == intervieweeMessage ? "flex-end" : "flex-start"
        }
      >
        <Grid item xs={5}>
          <Paper
            className={
              senderId == intervieweeMessage
                ? classes.intervieweeMessage
                : classes.solverMessage
            }
          >
            {message.message}
            {/* 送信取り消し */}
            <span onClick={handleDelete}>☓</span>
          </Paper>
          <span>{message.created_at}</span>：&nbsp;
        </Grid>
      </Grid>
    </>
  );
};

export default MessageBox;
