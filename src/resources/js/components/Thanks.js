import React, { useState, useContext } from "react";
import { Grid, Link, Button } from "@material-ui/core";
import Typography from "@material-ui/core/Typography";

function Thanks() {
  return (
    <Grid container alignItems="center" justifyContent="center">
      <Typography variant="h4">送信完了しました。</Typography>
      <Typography variant="h3">
        <Link href="/search">検索に戻る</Link>
      </Typography>
    </Grid>
  );
}

export default Thanks;
