import React, { useState, useEffect } from "react";
import ReactDOM from "react-dom";
import {
  Box,
  Drawer,
  CssBaseline,
  Toolbar,
  Typography,
  Divider,
  IconButton,
  AppBar,
} from "@material-ui/core";

import axios from "axios";
import MessageList from "./organisms/MessageList";
import Message from "./organisms/Message";
import StartMessage from "./organisms/StartMessage";

/***************************
useContext
***************************/
export const roleIdContext = React.createContext();

const Thread = (props) => {
  /***************************
  user_id取得
  ***************************/
  const targetDom = document.getElementById("thread");
  const userId = targetDom.dataset.userId;
  console.log(userId, "userId");

  /***************************
  role_id取得
  ***************************/
  const roleId = targetDom.dataset.roleId;
  console.log(roleId, "roleId");
  const intervieweeId = 2;

  /***************************
  現在のmessageListのnumber
  ***************************/
  const [currentThreadId, setCurrentThreadId] = useState(0);
  const changeThreadId = (number) => {
    setCurrentThreadId(number);
  };

  /***************************
  thread_data
  ***************************/
  const [getThread, setGetThread] = useState([]);
  useEffect(() => {
    const getThreadData = () => {
      const getURL = `http://localhost/thread/get/${userId}/${roleId}`;
      axios
        .get(getURL)
        .then((response) => {
          setGetThread(response.data);
        })
        .catch((error) => console.log(error));
    };
    getThreadData();
  }, []);

  const { window } = props;
  const [mobileOpen, setMobileOpen] = useState(false);
  const handleDrawerToggle = () => {
    setMobileOpen(!mobileOpen);
  };

  const drawer = (
    <div>
      <Toolbar />
      <Divider />
      {getThread.map((thread, index) => {
        return (
          <MessageList
            key={thread.id}
            thread={thread}
            roleId={roleId}
            changeThreadId={changeThreadId}
          />
        );
      })}
    </div>
  );

  const container =
    window !== undefined ? () => window().document.body : undefined;

  const drawerWidth = 230;
  return (
    <Box sx={{ display: "flex" }}>
      <CssBaseline />
      <AppBar
        position="fixed"
        sx={{
          width: { sm: `calc(100% - ${drawerWidth}px)` },
          ml: { sm: `${drawerWidth}px` },
        }}
      >
        <Toolbar>
          <IconButton
            color="inherit"
            aria-label="open drawer"
            edge="start"
            onClick={handleDrawerToggle}
            sx={{ mr: 2, display: { sm: "none" } }}
          ></IconButton>
          <Typography variant="h6" noWrap component="div">
            Responsive drawer
          </Typography>
        </Toolbar>
      </AppBar>
      <Box
        component="nav"
        sx={{ width: { sm: drawerWidth }, flexShrink: { sm: 0 } }}
        aria-label="mailbox folders"
      >
        <Drawer
          container={container}
          variant="temporary"
          open={mobileOpen}
          onClose={handleDrawerToggle}
          ModalProps={{
            keepMounted: true, // Better open performance on mobile.
          }}
          sx={{
            display: { xs: "block", sm: "none" },
            "& .MuiDrawer-paper": {
              boxSizing: "border-box",
              width: drawerWidth,
            },
          }}
        >
          {drawer}
        </Drawer>
        <Drawer
          variant="permanent"
          sx={{
            display: { xs: "none", sm: "block" },
            "& .MuiDrawer-paper": {
              boxSizing: "border-box",
              width: drawerWidth,
            },
          }}
          open
        >
          {drawer}
        </Drawer>
      </Box>
      <Box
        component="main"
        sx={{
          flexGrow: 1,
          p: 3,
          width: { sm: `calc(100% - ${drawerWidth}px)` },
        }}
      >
        <Toolbar />

        {currentThreadId == 0 ? (
          <StartMessage />
        ) : (
          <roleIdContext.Provider value={roleId} key={roleId}>
            <Message key={getThread.id} currentThreadId={currentThreadId} />
          </roleIdContext.Provider>
        )}
      </Box>
    </Box>
  );
};

export default Thread;

if (document.getElementById("thread")) {
  ReactDOM.render(<Thread />, document.getElementById("thread"));
}
