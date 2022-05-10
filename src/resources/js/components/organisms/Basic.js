import { useForm, Controller } from "react-hook-form";
import React, { useState, useContext, useEffect } from "react";
import {
  TextField,
  Grid,
  Checkbox,
  MenuItem,
  FormControlLabel,
  Hidden,
  FormControl,
} from "@material-ui/core/";
import {
  Box,
  Card,
  CardContent,
  Button,
  Typography,
} from "@mui/material";

import { UserInputDataContext } from "./Content";
import { userIdContext } from "./Content";

function Basic(props) {
  const userId = useContext(userIdContext);

  const { control, handleSubmit } = useForm({
    defaultValues: {
      companyName: "",
      department: "",
    },
  });
  const onSubmit = () => {
    props.handleNext();
    setCurrentState({
      solverId: [...selectedSolverId],
      companyName: companyKeyword,
      department: departmentKeyword,
      userId: userId,
    });
  };
  const [companyKeyword, setCompanyKeyword] = useState("");
  const [departmentKeyword, setDepartmentKeyword] = useState("");
  const [users, setUsers] = useState([]);
  const [balance, setBalance] = useState(0);

  const getData = () => {
    axios
      .get(
        `http://localhost/search/getUser/${companyKeyword}/${departmentKeyword}`
      )
      .then((response) => setUsers(response.data))
      .catch((error) => console.log(error));
  };

  const { currentState, setCurrentState } = useContext(UserInputDataContext);
  const [selectedSolverId, setSelectedSolverId] = useState([]);
  const handleCheck = (event) => {
    var updatedList = [...selectedSolverId];
    if (event.target.checked) {
      updatedList = [...selectedSolverId, event.target.value];
    } else {
      updatedList.splice(selectedSolverId.indexOf(event.target.value), 1);
    }
    setSelectedSolverId(updatedList);
  };

  useEffect(() => {
    const getUserBalance = () => {
      axios
        .get(`http://localhost/api/userBalance/${userId}`)
        .then((response) => setBalance(response.data))
        .catch((error) => console.log(error));
    };
    getUserBalance();
  }, []);
  console.log(balance, "balance");

  return (
    <>
      <Grid item={true} container>
        <Grid item={true} sm={2} />
        <Grid item={true} lg={8} sm={8}>
          <TextField
            id="outlined-basic"
            label="会社"
            variant="outlined"
            onChange={(e) => setCompanyKeyword(e.target.value)}
            name="companyName"
          />
          <TextField
            id="outlined-basic"
            label="部署"
            variant="outlined"
            onChange={(e) => setDepartmentKeyword(e.target.value)}
            name="departmentName"
          />
          <form onSubmit={handleSubmit(onSubmit)}>
            <div className="checkList">
              <div className="list-container">
                {users.map((user, index) => (
                  <Box key={index} sx={{ display: "flex" }}>
                    <input
                      value={user.id}
                      type="checkbox"
                      onChange={handleCheck}
                    />
                    <Typography>{user.sex}/</Typography>
                    <Typography>{user.company}/</Typography>
                    <Typography>{user.department}/</Typography>
                    <Typography>{user.working_period}年/</Typography>
                  </Box>
                ))}
              </div>
            </div>
            <Box
              sx={{
                display: "flex",
                flexDirection: "column",
                alignItems: "center",
                justifyContent: "center",
              }}
            >
              <Button
                sx={{ width: 250, my: 3.5, display: "block" }}
                variant="contained"
                color="primary"
                onClick={getData}
              >
                この条件で検索する
              </Button>
              <Button
                sx={{ width: 250, display: "block" }}
                disabled={balance < 1}
                variant="contained"
                color="primary"
                type="submit"
              >
                面談を申し込む
              </Button>
            </Box>
          </form>
          {balance < 1 && (
            <Card sx={{ minWidth: 275, p: 2.0 }}>
              <CardContent>
                <Typography variant="h5" component="h4" sx={{ mb: 3.0 }}>
                  チケット数：0
                </Typography>

                <Typography sx={{ fontSize: 14, mb: 1.5 }}>
                  ⚠チケットが足りません。10分通話で1枚必要です。
                </Typography>
              </CardContent>
              <Typography>
                <Button
                  sx={{
                    fontSize: 16,
                    px: 1.5,
                    py: 1.0,
                    bgcolor: "red",
                    color: "white",
                    "&:hover": {
                      bgcolor: "red",
                    },
                  }}
                >
                  ＋チケットを買う
                </Button>
              </Typography>
            </Card>
          )}
        </Grid>
      </Grid>
    </>
  );
}

export default Basic;
