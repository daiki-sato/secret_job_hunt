import { useForm, Controller } from "react-hook-form";
import React, { useState, useContext, useEffect } from "react";
import {
  TextField,
  Button,
  Typography,
  Grid,
  Box,
  Checkbox,
  MenuItem,
  FormControlLabel,
  Hidden,
  FormControl,
} from "@material-ui/core/";

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
            <Box sx={{ mx: "auto", width: 200, m: 2 }}>
              <Button variant="contained" color="primary" onClick={getData}>
                この条件で検索する
              </Button>
            </Box>
            <Button variant="contained" color="primary" type="submit">
              情報を保持して次へ
            </Button>
          </form>
        </Grid>
      </Grid>
    </>
  );
}

export default Basic;
