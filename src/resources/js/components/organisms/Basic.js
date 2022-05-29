import { useForm, Controller } from "react-hook-form";
import React, { useState, useContext, useEffect } from "react";
import { Grid } from "@material-ui/core/";
import {
  Box,
  Card,
  CardContent,
  Button,
  Typography,
  TextField,
} from "@mui/material";
import { DataGrid } from "@mui/x-data-grid";
import Autocomplete, { createFilterOptions } from "@mui/material/Autocomplete";
import { UserInputDataContext } from "./Content";
import { userIdContext } from "./Content";

const filter = createFilterOptions();
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

  const [companyApiData, setCompanyApiData] = useState([]);

  const getCompanyApiData = (keyword) => {
    setCompanyApiData([]);
    axios
      .get(`http://localhost/api/getCompany/${keyword}`)
      .then((response) => setCompanyApiData(response.data))
      .catch((error) => console.log(error));
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

  const [value, setValue] = useState(null);
  const columns = [
    { field: "id", headerName: "ID", hide: true },
    { field: "icon", headerName: "icon", width: 10 },
    {
      field: "company",
      headerName: "会社",
      width: 110,
      editable: true,
    },
    {
      field: "department",
      headerName: "部署",
      width: 180,
      editable: true,
    },
    {
      field: "sex",
      headerName: "性別",
      width: 180,
      editable: true,
    },
    {
      field: "workingPeriod",
      headerName: "勤務年数",
      type: "number",
      width: 110,
      editable: true,
    },
  ];
  const rows = [
    users.map((user) => ({
      id: user.id,
      icon: 1,
      company: user.company,
      department: user.department,
      sex: user.sex,
      workingPeriod: user.working_period,
    })),
  ];
  const top100Films = [
    companyApiData.map((companyInfo) => ({
      title: companyInfo.name,
      year: 1994,
    })),
  ];

  return (
    <>
      <Grid item={true} container>
        <Grid item={true} sm={2} />
        <Grid item={true} lg={8} sm={8}>
          <Box
            sx={{
              display: "flex",
              alignItems: "center",
              justifyContent: "center",
            }}
          >
            <Autocomplete
              value={value}
              onChange={(event, newValue) => {
                if (typeof newValue === "string") {
                  setValue({
                    title: newValue,
                  });
                } else if (newValue && newValue.inputValue) {
                  setValue({
                    title: newValue.inputValue,
                  });
                } else {
                  setValue(newValue);
                }
              }}
              filterOptions={(options, params) => {
                const filtered = filter(options, params);
                const { inputValue } = params;
                // Suggest the creation of a new value
                const isExisting = options.some(
                  (option) => inputValue === option.title
                );
                if (inputValue !== "" && !isExisting) {
                  filtered.push({
                    inputValue,
                    title: `Add "${inputValue}"`,
                  });
                }
                return filtered;
              }}
              selectOnFocus
              clearOnBlur
              handleHomeEndKeys
              id="free-solo-with-text-demo"
              options={top100Films[0]}
              getOptionLabel={(option) => {
                // Value selected with enter, right from the input
                if (typeof option === "string") {
                  return option;
                }
                // Add "xxx" option created dynamically
                if (option.inputValue) {
                  return option.inputValue;
                }
                // Regular option
                return option.title;
              }}
              renderOption={(props, option) => (
                <>
                  <li {...props}>{option.title}</li>
                </>
              )}
              sx={{ width: 400 }}
              freeSolo
              renderInput={(params) => (
                <TextField
                  {...params}
                  id="outlined-basic"
                  sx={{ width: 400, mr: 2 }}
                  label="会社"
                  variant="outlined"
                  onChange={(e) => setCompanyKeyword(e.target.value)}
                  name="companyName"
                  onKeyDown={(e) => getCompanyApiData(e.target.value)}
                />
              )}
            />
            <TextField
              sx={{ width: 400, ml: 2 }}
              id="outlined-basic"
              label="部署"
              variant="outlined"
              onChange={(e) => setDepartmentKeyword(e.target.value)}
              name="departmentName"
            />
          </Box>
          <form onSubmit={handleSubmit(onSubmit)}>
            {users.length > 0 && (
              <div style={{ height: 400, width: "100%" }}>
                <DataGrid
                  rows={rows[0]}
                  columns={columns}
                  pageSize={25}
                  // rowsPerPageOptions={[5, 10, 20]}
                  checkboxSelection
                  disableSelectionOnClick
                  onSelectionModelChange={(newSelectionModel) => {
                    setSelectedSolverId(newSelectionModel);
                  }}
                  selectionModel={selectedSolverId}
                />
              </div>
            )}
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
