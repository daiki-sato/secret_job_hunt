import React, { useState, useContext } from "react";
import { Typography, Grid } from "@material-ui/core";

const StartMessage = () => {
  return (
    <>
      <Grid container alignItems="center" justifyContent="center">
        <Grid item xs={8}>
          <Typography variant="h3" component="p" gutterBottom>
            トークを始めよう!
          </Typography>
        </Grid>
      </Grid>
    </>
  );
};

export default StartMessage;
