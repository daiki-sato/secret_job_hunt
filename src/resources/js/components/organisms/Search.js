import React from "react";
import ReactDOM from "react-dom";
import { Grid } from "@material-ui/core";
import Content from "./Content";

const Search = () => {
  return (
    <Grid container direction="column">
      <div style={{ padding: 30 }}>
        <Content />
      </div>
    </Grid>
  );
};

export default Search;

if (document.getElementById("search")) {
  ReactDOM.render(<Search />, document.getElementById("search"));
}
