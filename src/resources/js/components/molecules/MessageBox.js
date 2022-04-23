import React from "react";

const MessageBox = (props) => {
  return (
    <div className="bg-info mb-4 p-2r">
      <div className="date_area">
        <span>{props.message.created_at}</span>：&nbsp;
      </div>
      <div className="message_box">
        <span>{props.message.message}</span>
      </div>
    </div>
  );
};

export default MessageBox;