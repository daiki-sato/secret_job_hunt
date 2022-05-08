import React, { useState, useContext } from "react";
import { Grid } from "@material-ui/core";
import Typography from "@material-ui/core/Typography";

function Thanks() {
  return (
    <Grid container alignItems="center" justifyContent="center">
      <Typography variant="h4">送信完了しました。</Typography>
    </Grid>
  );
}

export default Thanks;
