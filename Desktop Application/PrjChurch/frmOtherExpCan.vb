Imports System.Data.OleDb
Public Class frmOtherExpCan

    Private Sub frmOtherExpCan_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        Me.Left = 0
        Me.Top = 100
        Width = 599
        Height = 421
        Me.MdiParent = mdiChurch
        Call prYear()
    End Sub

    Private Sub prYear()
        Try

            Call conns()
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [Expenses]  "

            'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
            'myreader = comUserSelect.ExecuteReader()

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            Dim rows As Integer
            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
            End While
            myAccessReader.Close()
            strconss.Close()
            If rows <> 0 Then
                Call conns()

                ComboBox4.Items.Clear()
                ComboBox5.Text = ""
                ComboBox5.Items.Clear()
                str_sql_user_select = "SELECT Distinct(vYear) AS [RecordYear] FROM Expenses "

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()
                Dim ro As Integer = 0
                While myAccessReader.Read()

                    ComboBox4.Items.Add(myAccessReader(Trim("RecordYear") & ""))

                    ro += 1

                End While
                strconss.Close()
                myAccessReader.Close()
            End If
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub
    Private amt As Double
    Private Sub requery()
        Try




            Call conns()
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [Expenses]  where dpaydate='" & dateapp & "'"

            'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
            'myreader = comUserSelect.ExecuteReader()

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            Dim rows As Integer
            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
            End While
            myAccessReader.Close()
            strconss.Close()
            If rows <> 0 Then
                dtptEdit.Rows.Clear()
                Call conns()
                str_sql_user_select = "SELECT *  FROM Expenses where dpaydate='" & dateapp & "'"

                ' comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)

                ' myreader = comUserSelect.ExecuteReader()

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                ' dt.Columns.Add("description", GetType(String))
                dtptEdit.Rows.Add(rows)
                'If dr.Read.Equals(True) Then
                Dim ro As Integer = 0
                While myAccessReader.Read()

                    'reading from the datareader
                    dtptEdit.Rows(ro).Cells(0).Value = myAccessReader("id")
                    dtptEdit.Rows(ro).Cells(1).Value = (myAccessReader("mAmount"))
                    dtptEdit.Rows(ro).Cells(2).Value = myAccessReader("vName")
                    dtptEdit.Rows(ro).Cells(3).Value = myAccessReader("vdescrib")

                    dtptEdit.Rows(ro).Cells(4).Value = myAccessReader("dpaydate")

                    'dtCousecode.Rows(ro).Cells(3).Value = myreader("CatExample")

                    ro += 1

                    'End If
                End While


                strconss.Close()

                myAccessReader.Close()

            End If
            If rows = 0 Then
                dtptEdit.Rows.Clear()
            End If
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub
    Private dateapp As String

    Private Sub DateTimePicker2_DropDown(ByVal sender As Object, ByVal e As System.EventArgs) Handles DateTimePicker2.DropDown
        ' Dim dates As Date
        'dates = CDate(DateTimePicker2.Text)

        'dateapp = CStr(dates)
        ' Call requery()
    End Sub

    Private Sub DateTimePicker2_MouseUp(ByVal sender As Object, ByVal e As System.Windows.Forms.MouseEventArgs) Handles DateTimePicker2.MouseUp
        Dim dates As Date
        ComboBox5.Text = ""
        ComboBox4.Text = ""
        dates = CDate(DateTimePicker2.Text)

        dateapp = CStr(dates)
        Call requery()
    End Sub
    Private Sub DateTimePicker2_ValueChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles DateTimePicker2.ValueChanged


        Dim dates As Date
        dates = CDate(DateTimePicker2.Text)

        dateapp = CStr(dates)
        ComboBox5.Text = ""
        ComboBox4.Text = ""
        Call requery()
    End Sub

    Private Sub Button1_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button1.Click
        Try
            Dim Choices As String

            If codes <> "" And amt <> 0 Then

                Choices = MsgBox("Are you sure you want to Cancel Other Expenses Payment ?", vbYesNo + vbInformation, "Cancel")

                If Choices = vbYes Then
                    Call conns()
                    str_sql_user_select = "Delete from [Expenses] where  id=" & codes & ""

                    'comUserSelect = New SqlCommand(str_sql_user_select, mycon)
                    'myreader = comUserSelect.ExecuteReader()
                    ' MsgBox("Data has been Deleted", MsgBoxStyle.Information, "Delete")

                    comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                    myAccessReader = comUserSelectS.ExecuteReader()

                    myAccessReader.Close()
                    strconss.Close()


                    Call conns()
                    Dim sqlString As String
                    sqlString = ""
                    ' Dim sqlStrings As String
                    sqlString = "UPDATE  [acct] SET " & _
                      "[mOtherExp] = [mOtherExp] - " & amt & " "

                    'comUserSelect = New SqlCommand(sqlString, mycon)
                    'comUserSelect.ExecuteNonQuery()
                    comUserSelectS = New OleDbCommand(sqlString, strconss)
                    myAccessReader = comUserSelectS.ExecuteReader()




                    sqlString = ""
                    ' Dim sqlStrings As String
                    sqlString = "UPDATE  [acct] SET " & _
                      "[mBalance] = [mBalance] +" & amt & " "

                    ' comUserSelect = New SqlCommand(sqlString, mycon)
                    'comUserSelect.ExecuteNonQuery()
                    comUserSelectS = New OleDbCommand(sqlString, strconss)
                    myAccessReader = comUserSelectS.ExecuteReader()

                    strconss.Close()
                    MsgBox("Payment has been Cancel", MsgBoxStyle.DefaultButton1, "Infomation")
                    Call requery()
                    Exit Sub
                End If
            End If






        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try

    End Sub

    Private Sub dtptEdit_CellContentClick(ByVal sender As System.Object, ByVal e As System.Windows.Forms.DataGridViewCellEventArgs) Handles dtptEdit.CellContentClick

    End Sub
    Private codes As String
    Private Sub dtptEdit_CellContentDoubleClick(ByVal sender As Object, ByVal e As System.Windows.Forms.DataGridViewCellEventArgs) Handles dtptEdit.CellContentDoubleClick
        codes = dtptEdit.CurrentRow.Cells(0).Value()
        amt = dtptEdit.CurrentRow.Cells(1).Value()
    End Sub

    Private Sub Button3_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button3.Click
        Me.Close()
    End Sub

    Private Sub Button4_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button4.Click
        dtptEdit.Rows.Clear()
    End Sub

    Private Sub dtptEdit_CellDoubleClick(ByVal sender As Object, ByVal e As System.Windows.Forms.DataGridViewCellEventArgs) Handles dtptEdit.CellDoubleClick
        codes = dtptEdit.CurrentRow.Cells(0).Value()
        amt = dtptEdit.CurrentRow.Cells(1).Value()
    End Sub

    Private Sub dtptEdit_DoubleClick(ByVal sender As Object, ByVal e As System.EventArgs) Handles dtptEdit.DoubleClick
        codes = dtptEdit.CurrentRow.Cells(0).Value()
        amt = dtptEdit.CurrentRow.Cells(1).Value()
    End Sub

    Private Sub ComboBox4_SelectedIndexChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles ComboBox4.SelectedIndexChanged
        Try

            Call conns()
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [Expenses]  where vYear='" & ComboBox4.Text & "'"

            'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
            'myreader = comUserSelect.ExecuteReader()

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            Dim rows As Integer
            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
            End While
            myAccessReader.Close()
            strconss.Close()
            If rows <> 0 Then
                dtptEdit.Rows.Clear()
                Call conns()
                str_sql_user_select = "SELECT *  FROM Expenses where vYear='" & ComboBox4.Text & "'"

                ' comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)

                ' myreader = comUserSelect.ExecuteReader()

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                ' dt.Columns.Add("description", GetType(String))
                dtptEdit.Rows.Add(rows)
                'If dr.Read.Equals(True) Then
                Dim ro As Integer = 0
                While myAccessReader.Read()

                    'reading from the datareader
                    dtptEdit.Rows(ro).Cells(0).Value = myAccessReader("id")
                    dtptEdit.Rows(ro).Cells(1).Value = (myAccessReader("mAmount"))
                    dtptEdit.Rows(ro).Cells(2).Value = myAccessReader("vName")
                    dtptEdit.Rows(ro).Cells(3).Value = myAccessReader("vdescrib")

                    dtptEdit.Rows(ro).Cells(4).Value = myAccessReader("dpaydate")

                    'dtCousecode.Rows(ro).Cells(3).Value = myreader("CatExample")

                    ro += 1

                    'End If
                End While


                strconss.Close()

                myAccessReader.Close()



                Call conns()


                ComboBox5.Text = ""
                ComboBox5.Items.Clear()
                str_sql_user_select = "SELECT Distinct(vMonth) AS [RecordYear] FROM Expenses where vYear= '" & ComboBox4.Text & "' "

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()
                ro = 0
                While myAccessReader.Read()

                    ComboBox5.Items.Add(myAccessReader(Trim("RecordYear") & ""))

                    ro += 1

                End While
                strconss.Close()
                myAccessReader.Close()

            End If
            If rows = 0 Then
                dtptEdit.Rows.Clear()
            End If



            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub ComboBox5_SelectedIndexChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles ComboBox5.SelectedIndexChanged
        Try

            Call conns()
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [Expenses]  where vYear='" & ComboBox4.Text & "' and vMonth ='" & ComboBox5.Text & "'"

            'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
            'myreader = comUserSelect.ExecuteReader()

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            Dim rows As Integer
            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
            End While
            myAccessReader.Close()
            strconss.Close()
            If rows <> 0 Then
                dtptEdit.Rows.Clear()
                Call conns()
                str_sql_user_select = "SELECT *  FROM Expenses where vYear='" & ComboBox4.Text & "' and vMonth ='" & ComboBox5.Text & "'"

                ' comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)

                ' myreader = comUserSelect.ExecuteReader()

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                ' dt.Columns.Add("description", GetType(String))
                dtptEdit.Rows.Add(rows)
                'If dr.Read.Equals(True) Then
                Dim ro As Integer = 0
                While myAccessReader.Read()

                    'reading from the datareader
                    dtptEdit.Rows(ro).Cells(0).Value = myAccessReader("id")
                    dtptEdit.Rows(ro).Cells(1).Value = (myAccessReader("mAmount"))
                    dtptEdit.Rows(ro).Cells(2).Value = myAccessReader("vName")
                    dtptEdit.Rows(ro).Cells(3).Value = myAccessReader("vdescrib")

                    dtptEdit.Rows(ro).Cells(4).Value = myAccessReader("dpaydate")

                    'dtCousecode.Rows(ro).Cells(3).Value = myreader("CatExample")

                    ro += 1

                    'End If
                End While


                strconss.Close()

                myAccessReader.Close()




            End If
            If rows = 0 Then
                dtptEdit.Rows.Clear()
            End If



            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub
End Class