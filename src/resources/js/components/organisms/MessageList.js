import React, { useState, useEffect } from "react";
import {
  Divider,
  Avatar,
  ListItemAvatar,
  ListItem,
  ListItemText,
  Typography,
} from "@material-ui/core";

const MessageList = (props) => {
  const roleId = props.roleId;
  const threadId = props.thread.id;

  /***************************
  ニックネーム
  ***************************/
  const intervieweeId = 2;
  const [nickname, setNickname] = useState("");
  const userId =
    roleId == intervieweeId ? props.thread.solver_id : props.thread.user_id;
  const getURL = `http://localhost/thread/getNickname/${userId}`;
  useEffect(() => {
    const getNickname = () => {
      axios
        .get(getURL)
        .then((response) => {
          setNickname(response.data);
        })
        .catch((error) => console.log(error));
    };
    getNickname();
  }, []);

  return (
    <>
      <ListItem
        button
        alignItems="flex-start"
        onClick={() => props.changeThreadId(threadId)}
      >
        <ListItemAvatar>
          <Avatar alt="Remy Sharp" src="" />
        </ListItemAvatar>
        <ListItemText
          primary={nickname}
          secondary={
            <React.Fragment>
              <Typography
                sx={{ display: "inline" }}
                component="span"
                variant="body2"
              >
                Ali Connors
              </Typography>
              {" — I'll be in your neighborhood doing errands this…"}
            </React.Fragment>
          }
        />
      </ListItem>
      <Divider variant="inset" component="li" />
    </>
  );
};

export default MessageList;
