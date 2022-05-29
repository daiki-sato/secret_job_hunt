import { Grid } from "@material-ui/core";
import React, { useState, useContext } from "react";
import { Button } from "@material-ui/core";
import { UserInputDataContext } from "./Content";
import {
  Table,
  TableBody,
  TableCell,
  TableContainer,
  TableHead,
  TableRow,
  Paper,
} from "@material-ui/core";

function Confirm(props) {
  var item = {
    checkBox: "チェックボックス",
    textBox: "テキストボックス",
    pullDown: "プルダウン",
  };
  const { currentState } = useContext(UserInputDataContext);
  const application = currentState.solverId;

  const startDate = currentState.interviewTimes.startDate;
  const endDate = currentState.interviewTimes.endDate;
  const onSubmit = () => {
    postData();
    props.handleNext();
  };
  async function postData() {
    const res = await fetch("http://localhost/api/interviewsData", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(currentState),
    });
  }

  const inputDataLists = [];

  var id = 0;
  for (var k in currentState) {
    for (var v in currentState[k]) {
      var value = "";
      if (currentState[k][v] === true) {
        value = "チェックしました";
      } else if (currentState[k][v] === false) {
        value = "チェックしていません";
      } else if (currentState[k][v] === "") {
        value = "未入力";
      } else {
        value = currentState[k][v];
      }
      inputDataLists.push({
        id: id,
        name: "qqqqq",
        value: value,
      });
      id++;
    }
  }
  return (
    <Grid container>
      <TableContainer component={Paper}>
        <Table aria-label="applicationCompany applicationDepartment">
          <TableHead>
            <TableRow>
              <TableCell>申し込み会社</TableCell>
              <TableCell>申し込み部署</TableCell>
            </TableRow>
          </TableHead>
          <TableBody>
            <TableRow>
              <TableCell>会社：{currentState.companyName}</TableCell>
              <TableCell>部署：{currentState.department}</TableCell>
            </TableRow>
          </TableBody>
        </Table>
        <Table aria-label="applicationNumber">
          <TableHead>
            <TableRow>
              <TableCell>申し込み人数</TableCell>
            </TableRow>
          </TableHead>
          <TableBody>
            <TableRow>
              <TableCell>{application.length}人</TableCell>
            </TableRow>
          </TableBody>
        </Table>
        <Table aria-label="Data">
          <TableHead>
            <TableRow>
              <TableCell>日時</TableCell>
            </TableRow>
          </TableHead>
          <TableBody>
            <TableRow>
              <TableCell>
                {startDate} ~ {endDate}
              </TableCell>
            </TableRow>
          </TableBody>
        </Table>
        {/* <TableBody>
            {inputDataLists.map(function(elem) {
              return (
                <TableRow key={elem.id}>
                  <TableCell>{elem.id}</TableCell>
                  <TableCell>{elem.name}</TableCell>
                  {elem.value ? (
                    <TableCell>{elem.value}</TableCell>
                  ) : (
                    <TableCell>None</TableCell>
                  )}
                </TableRow>
              );
            })}
          </TableBody> */}
      </TableContainer>
      <Button variant="contained" color="primary" onClick={props.handleBack}>
        戻る
      </Button>
      <Button variant="contained" color="primary" onClick={onSubmit}>
        送信
      </Button>
    </Grid>
  );
}

export default Confirm;
